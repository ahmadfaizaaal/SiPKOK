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
		// $this->load->model('M_Organisasi');
	}

	public function register() {
		$judul = "SiPKOK-Register";
		$data['judul'] = $judul;
		$data['organisasi'] = $this->M_Organisasi->selectOrganisasiAll();
		$this->load->view('register', $data);
	}

	public function berandaPO() {
		$judul = "SiPKOK-Beranda Pimpinan Organisasi";
		$data['judul'] = $judul;
		$this->load->view('view_berandaPimOr', $data);	
	}

	public function login(){
		$email = $this->input->post("email_login");
		$password = $this->input->post("password_login");
		$count = $this->M_Akun->countAkun($email);
		$akun = $this->M_Akun->selectAkun($email);
		if ($count > 0){
			if ($akun[0]->password == $password){				
				echo "Password Benar";
			} else {
				echo "Password Salah";
			}
		} else {
			echo "sasaasasas";
		}
	}
}
?>