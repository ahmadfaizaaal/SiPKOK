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
	// public function tambahProker($idOrganisasi){
	public function tambahProker($idOrganisasi){
		$data["idProker"] = "";
		// $data["idOrganisasi"] = $idOrganisasi;
		$data["idOrganisasi"] = "O001";
		$data["namaProker"] = $this->input->post("namaProker");
		$data["pelaksana"] = $this->input->post("pelaksana");
		$data["waktu"] = $this->input->post("waktu");
		if ($this->input->post("jenis") == "Berproposal"){
			$data["jenis"] = 0;
		} else {
			$data["jenis"] = 1;
		}
		// $data["jenis"] = "";
		// $data["proposal"] = "";
		// $data["lpj"] = "";
		$this->M_Proker->insertProker($data);
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
		// echo "<script type='text/javascript'>alert('Tambah Program Kerja Sukses');</script>";
		// alert("Tambah Program Kerja Sukses");
		redirect(base_url());
	}
}
?>