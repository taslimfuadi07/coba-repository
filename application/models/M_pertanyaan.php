<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_pertanyaan extends CI_Model {
 
    var $table = 'tbl_soal';
    var $column_order = array(null, 'soal'); //set column field database for datatable orderable
    var $column_search = array('soal'); //set column field database for datatable searchable 
    var $order = array('create_date' => 'DESC'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function pertanyaan_simpan($data){
        if($this->db->insert($this->table,$data)){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
    }

    function jawaban_simpan($data){
        if($this->db->insert('tbl_jawaban',$data)){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
    }

    function jawaban_hapus($data){
        $this->db->where('id_jawaban',$data);
        if($this->db->delete('tbl_jawaban')){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
    }

    function soal_hapus($data){
        $tables = array('tbl_soal', 'tbl_jawaban');
        $this->db->where('id_soal',$data);
        $result = $this->db->delete($tables);
        return $result;
    }

    function jawaban_lihat($id){
        $this->db->from('tbl_jawaban');
        $this->db->where('id_soal',$id);
        $this->db->order_by('point','DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);

        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }

        if(isset($this->order)) // here order processing
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        } 

    }
 
    function get_datatables($status)
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1);
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($status)
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all($status)
    {
       
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function m_ganti_status($no_regis,$data){
        $status = array('status_siswa' => $data);
        // var_dump($status);
        $this->db->where('id_siswa',$no_regis);
        $this->db->update('siswa',$status);
    }
}