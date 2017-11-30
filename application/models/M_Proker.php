<?php class M_Proker extends CI_Model {
	public function index(){
		echo "M_Proker";
	// public function index(){
	// 	echo "M_Proker";
	// }
	public function selectProkerAll(){
		$query = $this->db->get('proker');
		return $query->result();
	}
	public function selectProkerByOrganisasi($idOrganisasi){
		$query = $this->db->where("idOrganisasi",$idOrganisasi);
		$query = $this->db->get('proker');
		return $query->result();
	}
}
?>