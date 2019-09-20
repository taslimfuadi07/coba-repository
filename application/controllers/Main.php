<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        
class Main extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('m_main');
    }

    public function index()
	{
		$data['jawaban'] = $this->m_main->load_jumlah_jawaban();
		$this->load->view('main/index',$data);
	}

	public function cek(){
		echo 'a';
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/home.php */