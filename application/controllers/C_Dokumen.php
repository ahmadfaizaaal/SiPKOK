<?php class C_Dokumen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Dokumen");
	}
	
	public function verifikasiDokumen($jenis, $idDokumen){
		$data["status"] = 2;
		$this->M_Dokumen->updateDokumen($data, $idDokumen);
		$this->session->set_userdata(array('dokumen'=>$this->M_Dokumen->selectDokumenAll(),true));
		redirect(base_url("C_Akun/admin"));
	}
}
?>