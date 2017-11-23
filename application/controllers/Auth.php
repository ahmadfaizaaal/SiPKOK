<?php class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Organisasi');
	}

	public function index() {
		$judul = "SiPKOK";
		$data['judul'] = $judul;		
		$this->load->view('mainView', $data);		
		// $this->load->model('M_Organisasi');
	}

	public function register() {
		$judul = "SiPKOK-Register";
		$data['judul'] = $judul;
		$data['organisasi'] = $this->M_Organisasi->selectOrganisasiAll();
		$this->load->view('register', $data);
	}

	public function berandaPimpinanOrganisasi() {
		$judul = "SiPKOK-Beranda Pimpinan Organisasi";
		$data['judul'] = $judul;
		$this->load->view('view_berandaPimOr', $data);	
	}
}
?>