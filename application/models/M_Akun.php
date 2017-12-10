<?php class M_Akun extends CI_Model {

	public function selectAkun($email){
		$query = $this->db->where("email",$email);
		$query = $this->db->get("akun");
		return $query->result();
	}
	public function selectAkunByStatus() {
		$query = $this->db->order_by("status", "asc");
		$query = $this->db->where_not_in('email','admin');
        $query = $this->db->join('organisasi', 'akun.organisasi = organisasi.idOrganisasi');
        $query = $this->db->from('akun');
        $query = $this->db->select('akun.idAkun as idAkun,
        							akun.nama as nama, 
        							akun.email as email, 
        							organisasi.namaOrganisasi as namaOrganisasi, 
        							akun.jabatan as jabatan, 
        							akun.status as status');
        $query = $this->db->get();
        return $query->result();
	}
	public function setStatus($idAkun) {
		$query = $this->db->where('idAkun',$idAkun);
        $query = $this->db->update('akun','1');
	}
	public function countAkun($email){
		$query = $this->db->where("email", $email);
		$query = $this->db->from("akun");
		$query = $this->db->count_all_results();
		return $query;
	}
	public function insertAkun($namaTabel, $data){
		$this->db->insert($namaTabel, $data);
	}
	public function updateAkun($data, $idAkun){
		$query = $this->db->where('idAkun',$idAkun);
        $query = $this->db->update('akun',$data);
	}
}
?>