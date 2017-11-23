<?php class Auth extends CI_Controller {

	public function index() {
		$judul = "SiPKOK";
		$data['judul'] = $judul;
		$this->load->view('mainView', $data);
	}

	public function register() {
		$judul = "SiPKOK-Register";
		$data['judul'] = $judul;
		$this->load->view('register', $data);
	}

	public function berandaPimpinanOrganisasi() {
		$judul = "SiPKOK-Beranda Pimpinan Organisasi";
		$data['judul'] = $judul;
		$this->load->view('view_berandaPimOr', $data);	
	}
}
?>