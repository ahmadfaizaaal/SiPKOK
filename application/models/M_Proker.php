<?php class M_Proker extends CI_Model {
	
	public function selectProkerAll(){
		$query = $this->db->get('proker');
		return $query->result();
	}
	public function selectProkerByOrganisasi($idOrganisasi){
		$query = $this->db->where("idOrganisasi",$idOrganisasi);
		$query = $this->db->get('proker');
		return $query->result();		
	}
	public function selectProkerById($idProker){
		$query = $this->db->where("idProker",$idProker);
		$query = $this->db->get('proker');
		return $query->result()[0];
	}
	public function selectProkerJoinDokumen($idOrganisasi){
		$query = $this->db->where('idOrganisasi',$idOrganisasi);
		$query = $this->db->join('dokumen as proposal', 'proker.proposal = proposal.idDokumen','left');
        $query = $this->db->join('dokumen as lpj', 'proker.lpj = lpj.idDokumen','left');
        $query = $this->db->from('proker');
        $query = $this->db->select('*, proker.jenis as jenisProker, 
        	proposal.idDokumen as idProposal, 
        	lpj.idDokumen as idLpj, 
        	proposal.namaDokumen as namaProposal, 
        	proposal.status as statProposal, 
        	lpj.namaDokumen as namaLpj, 
        	lpj.status as statLpj');
        $query = $this->db->get();
        return $query->result();
	}
	public function insertProker($data){
		$this->db->insert("proker", $data);
	}
	public function updateProker($data, $idProker){
		$query = $this->db->where('idProker',$idProker);
        $query = $this->db->update('proker',$data);
	}
	public function deleteProker($idProker){
		$this->db->where('idProker', $idProker);
		$this->db->delete('proker');
	}
}
?>