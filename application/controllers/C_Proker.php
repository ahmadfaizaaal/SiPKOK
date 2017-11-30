<?php class C_Proker extends CI_Controller {
	// public function index(){
	// 	echo "C_Dokumen";
	// }
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Proker');
		// $this->load->controller("C_Organisasi");
	}

	public function hapusProker($idProker){
		$this->db->where('idProker', $idProker);
		$this->db->delete('proker');
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerByOrganisasi($this->session->userdata('akunAktif')->organisasi)),true);
		redirect(base_url());
		// $this->load->view('view_beranda_Pimpinan_Organisasi', $data);
		// $this->
	}
}
?>