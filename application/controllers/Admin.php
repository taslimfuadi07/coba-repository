<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        
class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library(array('template'));
        $this->load->model('m_pertanyaan');
        $this->load->model('m_kuis');
        $this->load->model('m_main');
       
    }

    public function index()
	{
		$data['active'] = 'pemasukan';
		$this->template->display('admin/buku/coba',$data);
	}
    public function pertanyaan(){
        $data['active'] = 'pertanyaan';
        $this->template->display('admin/pertanyaan/index',$data);
    }

    public function input_pertanyaan(){
        $data['active'] = 'pertanyaan';
        $this->template->display('admin/pertanyaan/input-pertanyaan',$data);
    }

    public function simpan_pertanyaan(){
        $data = $this->input->post();

        $simpan = $this->m_pertanyaan->pertanyaan_simpan($data);
        return $simpan;
    }

    public function simpan_jawaban(){
        $data = $this->input->post();

        $simpan = $this->m_pertanyaan->jawaban_simpan($data);
        return $simpan;
    }

    public function lihat_jawaban(){
        $data = $this->input->get('id');

        $lihat = $this->m_pertanyaan->jawaban_lihat($data);
        echo json_encode($lihat, JSON_PRETTY_PRINT);
    }

    public function hapus_jawaban(){
        $data = $this->input->get('id');

        $hapus = $this->m_pertanyaan->jawaban_hapus($data);
        return $hapus;
    }

    public function hapus_soal(){
        $data = $this->input->get('id');

        $hapus = $this->m_pertanyaan->soal_hapus($data);
        echo json_encode($hapus);
    }
    
	public function ajax_list_data()
    {
        $id = $this->uri->segment(3);
        $list = $this->m_pertanyaan->get_datatables($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
             
            $no++;
            $row = array();
            $row[] = $customers->create_date;
            $row[] = $customers->soal;
            $row[] = "<button class='btn waves-effect waves-light btn-success btn-icon' id='tambah'><i class='fa fa-plus' alt='Tambah Jawaban'></i></button>
                    <button class='btn waves-effect waves-light btn-primary btn-icon' id='lihat'><i class='fa fa-eye'></i></button> 
                     
                    <button class='btn waves-effect waves-light btn-danger btn-icon' id='hapus'><i class='fa fa-trash'></i></button>
                    ";
            $row[] = $customers->create_date;
            $row[] = $customers->id_soal;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_pertanyaan->count_all($id),
                        "recordsFiltered" => $this->m_pertanyaan->count_filtered($id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_data_persiapan()
    {
        $id = $this->uri->segment(3);
        $list = $this->m_kuis->get_datatables($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
             
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->nama_kuis;
            $row[] = $customers->tanggal_kuis;
            $row[] = "<a href='tambah_soal_kuis/$customers->id_kuis' class='btn waves-effect waves-light btn-success btn-icon'><i class='fa fa-plus' alt='Tambah Soal Kuis'></i></a>
                    <button class='btn waves-effect waves-light btn-primary btn-icon' id='lihat_soal_kuis'><i class='fa fa-eye'></i></button> 
                    <button class='btn waves-effect waves-light btn-danger btn-icon' id='hapus_soal_kuis'><i class='fa fa-trash'></i></button>
                    ";
            $row[] = $customers->id_kuis;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_pertanyaan->count_all($id),
                        "recordsFiltered" => $this->m_pertanyaan->count_filtered($id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function listmenu()
	{
		//$this->load->view('template');
		$data['active'] = 'list_buku';
		$this->template->display('ppdb/admin/buku/lihat-data',$data);
	}

    public function format_tanggal($data)
    {
        if($data ==''){
            $tanggal = NULL;
        }
        else{
            $date=date_create($data);
            $date = date_format($date,"d-m-Y");
            
            $bulan=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            $tgl = substr($date, 0,2);
            $bln = substr($date, 3,2);
            $thn = substr($date, 6,4);
            $tanggal = $tgl.' '.$bulan[$bln-1].' '.$thn;
        }
        return $tanggal;
    }

	public function ubah_status(){
        $data = $this->input->post();
        $no_regis = $data['status'];
        $data_id = explode(',', $data['data']);
        for ($i=1; $i <= count($data_id); $i++) { 
            // echo $data_id[$i-1];
            $this->daftar->m_ganti_status($data_id[$i-1],$no_regis);
        }
        echo 'Sukses';
    }
	
    //----- Hal Persiapan ------
    public function persiapan(){
        $data['active'] = 'persiapan';
        $this->template->display('admin/kuis/persiapan',$data);
    }

    public function input_kuis(){
        $data['active'] = 'persiapan';
        $this->template->display('admin/kuis/input-kuis',$data);
    }
    public function simpan_kuis(){
        $simpan = $this->m_kuis->kuis_simpan();
        return $simpan;
    }
    public function simpan_kuis_pertanyaan(){
        $simpan = $this->m_kuis->kuis_pertanyaan_simpan();
        return $simpan;
    }
    public function tambah_soal_kuis(){
        $data['active'] = 'persiapan';
        $data['id']     = $this->uri->segment(3);
        $data['soal']   = $this->m_kuis->get_soal();
        $this->template->display('admin/kuis/input-soal-kuis',$data);
    }
	
    //----- Hal Persiapan ------
    public function main(){
        $data['active'] = 'main';
        $this->template->display('admin/kuis/main',$data);
    }
    public function ajax_list_data_main()
    {
        $id = $this->uri->segment(3);
        $list = $this->m_main->get_datatables($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
             
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->nama_kuis;
            $row[] = $this->m_main->count_soal($customers->id_kuis);
            $row[] = "<button class='btn waves-effect waves-light btn-primary btn-icon' id='main'><i class='fa fa-play'></i></button>
                    ";
            $row[] = $customers->id_kuis;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_main->count_all($id),
                        "recordsFiltered" => $this->m_main->count_filtered($id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function main_mulai(){
        $data['active'] = 'main';
        $data['soal']   = $this->m_main->get_soal_kuis();
        $this->template->display('admin/kuis/main-mulai',$data);
    }
    public function tampil_jawaban(){
        $data = $this->m_main->tampil_jawaban();
        return $data;
    }
    public function tampil_salah(){
        $data = $this->m_main->tampil_salah();
        return $data;
    }
    public function tampil_lanjut(){
        $data['soal']   = $this->m_main->get_soal_kuis();
        $this->load->view('admin/kuis/main-mulai-next',$data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/home.php */