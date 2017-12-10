<?php class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Organisasi');
		$this->load->model('M_Akun');
	}

	public function index() {
		$judul = "SiPKOK";
		$data['judul'] = $judul;		
		$this->load->view('mainView', $data);		
	}
}
?>