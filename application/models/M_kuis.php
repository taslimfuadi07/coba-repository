<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_kuis extends CI_Model {
 
    var $table = 'tbl_kuis';
    var $column_order = array(null, 'nama_kuis', 'tanggal_kuis'); //set column field database for datatable orderable
    var $column_search = array('nama_kuis'); //set column field database for datatable searchable 
    var $order = array('tanggal_kuis' => 'DESC'); // default order 
    
    function pertanyaan_simpan($data){
        if($this->db->insert($this->table,$data)){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
    }

    function kuis_simpan(){
        $data = $this->input->post();
        if($this->db->insert($this->table, $data)){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
    }

    function get_soal(){
        $data = $this->db->get('tbl_soal');
        return $data->result();   
    }

    function kuis_pertanyaan_simpan(){
        $data = $this->input->post();
        var_dump($data);
        $array = explode(',', $data['multiple_value']);
        $b = array_filter($array);
        $no = 1;
        var_dump($b);
        foreach ($b as $value) {
            $kuis[] = array( 'nomor' => $no++, 'id_soal' => $value, 'id_kuis'=>$data['idKuis']);
        }
        var_dump($kuis);
        $this->db->insert_batch('tbl_soal_kuis', $kuis);
        die();
        if($this->db->insert($this->table, $data)){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
    }

    function jawaban_hapus(){

        $this->db->where('id_jawaban',$data);
        if($this->db->delete('tbl_jawaban')){
            echo 'sukses';
        }
        else{
            echo 'gagal';
        }
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
}