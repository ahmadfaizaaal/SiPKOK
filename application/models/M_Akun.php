<?php class M_Akun extends CI_Model {
	// public function index(){
	// 	echo "M_Akun";
	// }
	public function selectAkun($email){
		$query = $this->db->where("email",$email);
		$query = $this->db->get("akun");
		return $query->result();
	}
	public function countAkun($email){
		$query = $this->db->where("email", $email);
		$query = $this->db->from("akun");
		$query = $this->db->count_all_results();
		return $query;
	}
}
?>