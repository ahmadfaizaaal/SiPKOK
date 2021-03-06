<?php class C_Akun extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Organisasi');
		$this->load->model('M_Akun');
		$this->load->model('M_Proker');
		$this->load->model('M_Dokumen');
	}

	public function index() {
		$judul = "SiPKOK";
		$data['judul'] = $judul;
		$this->load->view('view_beranda_Pimpinan_Organisasi', $data);		
	}

	public function admin() {
		$judul = "SiPKOK";
		$data['judul'] = $judul;
		$this->load->view('view_beranda_admin', $data);	
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
		$password = md5($this->input->post("password_login"));
		$count = $this->M_Akun->countAkun($email);
		$akun = $this->M_Akun->selectAkun($email);
		$data['judul'] = "Beranda";		
		if ($count > 0){
			if ($akun[0]->password == $password){
				if ($akun[0]->status == 1) {
					if ($email == "admin" && $email == $akun[0]->email) {
						$organisasi = $this->M_Organisasi->selectOrganisasiAll();
						$this->session->set_userdata(array(
							'akunAktif'=>$akun[0],
							'akunTerdaftar'=>$this->M_Akun->selectAkunByStatus(),
							'dokumen' =>$this->M_Dokumen->selectDokumenAll(),
							'organisasi'=>$organisasi),
						true);
						redirect(base_url('C_Akun/admin'));	
					} else {
						$organisasi = $this->M_Organisasi->selectOrganisasi($akun[0]->organisasi);
						$this->session->set_userdata(array(
							'akunAktif'=>$akun[0], 
							'proker'=>$this->M_Proker->selectProkerJoinDokumen($akun[0]->organisasi),
							'organisasi'=>$organisasi),
						true);
						redirect(base_url());
					}
				} else {
					echo "<script>
								alert(\"Akun belum diverifikasi oleh admin!\");
						  </script>";
					redirect(base_url(), 'refresh');
				}				
			} else {
				echo "<script>
					   	  alert(\"Password Salah!\");
				      </script>";
				redirect(base_url(), 'refresh');
			}
		} else {
			echo "<script>
					  alert(\"Email Belum Terdaftar!\");
				  </script>";
			redirect(base_url(), 'refresh');
		}
	}

	public function doRegister(){
		if($this->input->post("kirim") == "Kirim"){
			$data["idAkun"] = "";
			$data["nama"] = $this->input->post("username");
			$data["organisasi"] = $this->M_Organisasi->selectIdOrganisasiByNama($this->input->post("organisasi"));		
			$data["email"] = $this->input->post("email");
			$data["password"] = md5($this->input->post("password"));
			$data["jabatan"] = $this->input->post("jabatan");
			$data["status"] = "";
			$this->M_Akun->insertAkun("akun", $data);
			redirect(base_url('C_Akun/logout'));
		} else if ($this->input->post("batal") == "Batal") {
			redirect(base_url());
		}		
	}

	public function logout(){
		$judul = "SiPKOK";
		$data['judul'] = $judul;
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function verifikasiAkun($idAkun){
		$data["status"] = 1;
		$this->M_Akun->updateAkun($data, $idAkun);
		$this->session->set_userdata(array('akunTerdaftar'=>$this->M_Akun->selectAkunByStatus(),true));
		redirect(base_url("C_Akun/admin"));
	}
}
?>