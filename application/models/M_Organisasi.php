<?php class M_Organisasi extends CI_Model {	
	// public function index(){
	// 	echo "select";
	// 	$result = selectOrganisasiAll();
	// }
	public function selectOrganisasiAll(){
		$query = $this->db->get('organisasi');		
		return $query->result();		
	}
}
?>
