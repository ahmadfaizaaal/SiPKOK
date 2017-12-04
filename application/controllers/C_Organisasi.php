<?php class C_Organisasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Organisasi");		
		$this->load->model("M_Proker");
	}
	// public function index(){
	// 	echo "C_Organisasi";
	// }
	
	// public function getOrganisasi($idOrganisasi){
	// 	$organisasi = $this->M_Organisasi->selectOrganisasi($idOrganisasi);
	// 	return $organisasi[0];
	// }
	public function ubahProfil($idOrganisasi){
		$data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		$data["namaOrganisasi"] = $this->input->post("namaOrganisasi");
		$data["kepanjangan"] = $this->input->post("kepanjangan");
		$data["namaKetua"] = $this->input->post("namaKetua");
		$data["visiMisi"] = $this->input->post("visiMisi");		
		$this->M_Organisasi->updateOrganisasi($data,$idOrganisasi);
		$this->session->set_userdata(array('organisasi'=>$this->M_Organisasi->selectOrganisasi($this->session->userdata('akunAktif')->organisasi)),true);
		// echo "<script type='text/javascript'>alert('Tambah Program Kerja Sukses');</script>";
		// alert("Tambah Program Kerja Sukses");
		redirect(base_url());
	}
}
?>