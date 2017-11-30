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
		redirect(base_url('C_Akun/index'));
		// $this->load->view('view_beranda_Pimpinan_Organisasi', $data);
		// $this->
	}

}
?>