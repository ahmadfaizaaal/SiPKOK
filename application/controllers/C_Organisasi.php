<?php class C_Organisasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Organisasi");		
	}
	public function index(){
		echo "C_Organisasi";
	}
	
	// public function getOrganisasi($namaOrganisasi){
	// 	$organisasi = $this->M_Organisasi->selectOrganisasiByNama($namaOrganisasi);
	// 	return $organisasi[0];
	// }
}
?>