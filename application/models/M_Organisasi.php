<?php class M_Organisasi extends CI_Model {	
	
	public function selectOrganisasiAll(){
		$query = $this->db->get('organisasi');
		return $query->result();
	}
	public function selectIdOrganisasiByNama($namaOrganisasi){
		$query = $this->db->where("namaOrganisasi",$namaOrganisasi);
		$query = $this->db->get('organisasi');
		$hasil = $query->result();		
		return $hasil[0]->idOrganisasi;
	}
	public function selectOrganisasi($idOrganisasi){
		$query = $this->db->where("idOrganisasi",$idOrganisasi);
		$query = $this->db->get('organisasi');
		$hasil = $query->result();
		return $hasil[0];
	}
	public function insertOrganisasi($data){
		$this->db->insert("organisasi", $data);
	}
	public function updateOrganisasi($data, $idOrganisasi){
		$query = $this->db->where('idOrganisasi',$idOrganisasi);
        $query = $this->db->update('organisasi',$data);
	}
	public function deleteOrganisasi($idOrganisasi){
		$this->db->where('idOrganisasi', $idOrganisasi);
		$this->db->delete('organisasi');
	}
}
?>
