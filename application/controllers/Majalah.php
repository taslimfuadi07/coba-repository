<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Majalah extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_majalah');
	}

	public function index(){
		$cari = $this->input->get('cari');
		$data['majalah'] = $this->m_majalah->view_majalah('1'); 
		$data['buletin'] = $this->m_majalah->view_majalah('2');
		// $data['model'] = $this->m_majalah->view($cari); // Panggil fungsi view() yang ada di model siswa

		$this->load->view('index', $data);
	}

	public function read(){
		$id = $this->uri->segment(3);
		$data['pdf'] = $this->m_majalah->m_read($id);
		$this->load->view('read',$data);
	}
	public function lists(){
		$data['model'] = $this->m_majalah->view(); // Panggil fungsi view() yang ada di model siswa

		$this->load->view('index', $data);
	}

	public function kontak(){
		$this->load->view('kontak');
	}

	public function tentang(){
		$this->load->view('tentang');
	}
 
}

