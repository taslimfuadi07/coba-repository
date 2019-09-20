<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	function __construct(){
		 parent::__construct();
		$this->load->model('m_daftar');
	}

	public function index()
	{
		$this->load->view('ppdb/index');
	}

	public function form(){
		$jenis = $this->uri->segment(2);
		$data['mayor'] = "";
		if($jenis == 'ma'){
			$data['mayor'] = $this->m_daftar->load_mayor();
		}
		$data['option'] = $this->m_daftar->load_pilihan();
		$this->load->view('ppdb/pendaftaran', $data);
	}
	public function cek_nis(){
		$nisn = $this->input->post('nisn');
		$cek = $this->m_daftar->m_cek_nis($nisn);

		echo $cek;
	}
	public function simpan_daftar(){
		$data_input = $this->input->post();
		$no_registrasi = $this->no_resgitrasi();
		$gelombang_pendaftaran = substr($no_registrasi, 5,1);
		$data_tambah = array('no_registrasi'		=> $no_registrasi, 
							'gelombang_pendaftaran'	=> $gelombang_pendaftaran,
							'tanggal_lahir' 		=> $this->ubah_tanggal($data_input['tanggal_lahir']),
							'tanggal_lahir_ayah' 	=> $this->ubah_tanggal($data_input['tanggal_lahir_ayah']),
							'tanggal_lahir_ibu' 	=> $this->ubah_tanggal($data_input['tanggal_lahir_ibu']),
							'tanggal_lahir_wali' 	=> $this->ubah_tanggal($data_input['tanggal_lahir_wali']),
							);
		// var_dump($data_tambah);
		$data_input = array_replace($data_input,$data_tambah);
		// // var_dump($data_input);
		$simpan = $this->m_daftar->m_simpan_daftar($data_input);
		 
		// echo $nr = $no_registrasi[0];
		$data_session = array('no_registrasi' => $no_registrasi);

		// $this->session->sess_destroy();
		$this->session->set_userdata($data_session);
		// var_dump($this->session->all_userdata());
		echo $simpan;
	}

	public function ubah_tanggal($data)
	{
		if($data ==''){
			$tanggal = NULL;
		}
		else{
			$date=date_create($data);
			$tanggal = date_format($date,"Y-m-d");
		}
		
		return $tanggal;
	}
	function ubah_tanggal_view($tanggal_ubah){
		if($tanggal_ubah != ""){
			$date=date_create($tanggal_ubah);
			$tanggal = date_format($date,"d-m-Y");
		}else{
			$tanggal = NULL;
		}
		return $tanggal;
	}

	public function no_resgitrasi(){
		$jumlah_siswa = $this->m_daftar->m_jumlah_siswa();
		$db_gelombang = $this->m_daftar->m_no_registrasi();
		//deklarasi
		$tahun = $db_gelombang[0]->tahun;
		$gelombang = $db_gelombang[0]->gelombang;
		$id_gelombangc = $db_gelombang[0]->id_gelombang;
		$no_siswa = $jumlah_siswa[0]->jumlah + 1;
		if($no_siswa<10){
			$no_siswa = '0000'.$no_siswa;
		}
		elseif($no_siswa<100){
			$no_siswa = '000'.$no_siswa;
		}
		elseif($no_siswa<1000){
			$no_siswa = '00'.$no_siswa;
		}
		elseif($no_siswa<10000){
			$no_siswa = '0'.$no_siswa;
		}
		
		$no_registrasi = $tahun.'0'.$gelombang.$no_siswa;
		return $no_registrasi;
	}

	public function insertloop()
	{
		for ($i=0; $i <= 800; $i++) { 
			$data = array('nisn' => rand(1111111111,9999999999));
			$this->db->insert('siswa',$data);
		}
	}

	public function berhasil(){
		$data['no_registrasi'] = $this->session->userdata('no_registrasi');
		$this->load->view('ppdb/pendaftaran_berhasil', $data);
	}

	public function contoh(){
	    $this->load->view('ppdb/preview');
	}

	public function cetakpdf(){
		$no_registrasi = $this->uri->segment(3);
	    $data_table = $this->m_daftar->m_cetak_daftar($no_registrasi);
	    $data['data_daftar'] = $data_table;
	    $data['tanggal'] = array(
    				'tanggal_lahir' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir), 
    				'tanggal_lahir_ayah' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir_ayah), 
    				'tanggal_lahir_ibu' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir_ibu), 
    				'tanggal_lahir_wali' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir_wali), 
    				'tanggal_buat' => $this->ubah_tanggal_view($data_table[0]->tgl_dibuat)
	    			);
	    $this->load->view('ppdb/preview', $data);
	}

	public function cetak(){
		ob_start();
	    $no_registrasi = $this->uri->segment(3);
	    $data_table = $this->m_daftar->m_cetak_daftar($no_registrasi);
	    $data['data_daftar'] = $data_table;
	    $data['tanggal'] = array(
    				'tanggal_lahir' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir), 
    				'tanggal_lahir_ayah' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir_ayah), 
    				'tanggal_lahir_ibu' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir_ibu), 
    				'tanggal_lahir_wali' => $this->ubah_tanggal_view($data_table[0]->tanggal_lahir_wali), 
    				'tanggal_buat' => $this->ubah_tanggal_view($data_table[0]->tgl_dibuat)
	    			);
	    $this->load->view('ppdb/print', $data);
	    $html = ob_get_contents();
	        ob_end_clean();
	        
	        require_once('./assets/plugin/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output('Data Siswa.pdf', 'D');
	}

	public function cek(){
		var_dump($this->session->all_userdata());
	}

	public function coba(){
		$tanggal2 = '';
		if ($tanggal2 != "") {
			echo 'aaa';
		}else{
			echo 'sssss';
		}
		
	}
}

