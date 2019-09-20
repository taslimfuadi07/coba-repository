<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_main extends CI_Model {
 
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

    function get_soal_kuis(){
        
        if(isset($_POST['idno'])){
            $nomor = $this->input->post('idno') + 1;
        }
        else{
            $nomor = 1;
        }

        if(isset($_POST['idkuis'])){
            $id = $this->input->post('idkuis');
        }
        else{
            $id = $this->uri->segment(3);
        }

        $query = "SELECT 
                (SELECT MAX(nomor) from tbl_soal_kuis WHERE id_kuis = '$id') as max,
                a.id_kuis,
                b.nomor,
                c.soal,
                c.id_soal,
                d.id_jawaban,
                d.jawaban,
                d.point,
                d.status
            FROM
                tbl_kuis AS a
                JOIN tbl_soal_kuis AS b ON a.id_kuis = b.id_kuis
                JOIN tbl_soal AS c ON b.id_soal = c.id_soal
                JOIN tbl_jawaban AS d ON c.id_soal = d.id_soal 
            WHERE
                b.nomor = '$nomor' 
                AND a.id_kuis = '$id' 
            ORDER BY
                d.point DESC";
        $data = $this->db->query($query);
        return $data->result();
    }

    function tampil_jawaban(){
        $id = $this->input->post('id');
        $data['status'] = 1;
        $this->db->where('id_jawaban',$id);
        if($this->db->update('tbl_jawaban',$data)){
            echo 'sukses';
        }
        else{
            'gagal';
        }
    }

    function tampil_salah(){
        $post = $this->input->post();
        $data['id_kuis'] = $post['idkuis'];
        $data['id_soal'] = $post['idsoal'];
        if($this->db->insert('tbl_salah',$data)){
            echo 'sukses';
        }
        else{
            'gagal';
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
    function count_soal($status)
    {
        $this->db->where('id_kuis',$status);
        $this->db->from('tbl_soal_kuis');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //---halaman client----
    function load_jumlah_jawaban(){
        $idkuis = $this->uri->segment(2);

        $query = "SELECT a.id_soal,b.id_jawaban from 
                tbl_soal_kuis as a 
                join 
                tbl_jawaban as b on a.id_soal=b.id_soal
                where a.nomor = '1'";
        $data = $this->db->query($query);
        return $data->result();
    }
}