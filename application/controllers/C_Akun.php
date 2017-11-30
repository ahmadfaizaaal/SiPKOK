<?php class C_Akun extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Organisasi');
		$this->load->model('M_Akun');
		$this->load->model('M_Proker');
		// $this->load->controller("C_Organisasi");
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
		$this->load->view('view_beranda_Pimpinan_Organisasi', $data);	
	}

	public function login(){
		$email = $this->input->post("email_login");
		$password = $this->input->post("password_login");
		$count = $this->M_Akun->countAkun($email);
		$akun = $this->M_Akun->selectAkun($email);		
		$data['akunAktif'] = $akun[0];
		$data['judul'] = "Beranda";
		$data['organisasi'] = $this->M_Proker->selectProkerAll();
		if ($count > 0){
			if ($akun[0]->password == $password){				
				$this->load->view('view_beranda_Pimpinan_Organisasi',$data);
			} else {
				echo "Password Salah";
			}
		} else {
			echo "sasaasasas";
		}
	}

	public function doRegister(){
		// echo $this->input->post("organisasi");
		// $this->load->model('M_Akun');
		// $this->load->library('../controllers/whathever');
		// $this->load->controller("C_Organisasi");		
		// echo $organisasi[0]->idOrganisasi;
		// echo $organisasi;
		$data["idAkun"] = "";
		$data["nama"] = $this->input->post("username");
		$data["organisasi"] = $this->M_Organisasi->selectIdOrganisasiByNama($this->input->post("organisasi"));		
		$data["email"] = $this->input->post("email");
		$data["password"] = $this->input->post("password");
		$data["jabatan"] = $this->input->post("jabatan");
		$data["status"] = "";
		$this->M_Akun->insertAkun("akun", $data);
	}
}
?>