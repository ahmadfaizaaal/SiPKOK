<?php class M_Dokumen extends CI_Model {
	// public function index(){
	// 	echo "M_Dokumen";
	// }
	public function getStatus($idDokumen){
		$query = $this->db->where("idDokumen",$idDokumen);
		$query = $this->db->get('dokumen');
		$hasil = $query->result();
		return $hasil[0]->status;
	}
	
}
?>