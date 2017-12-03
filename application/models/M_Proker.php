<?php class M_Proker extends CI_Model {
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
	public function selectProkerJoinDokumen($idOrganisasi){
		$query = $this->db->where('idOrganisasi',$idOrganisasi);
		$query = $this->db->join('dokumen as proposal', 'proker.proposal = proposal.idDokumen',left);
        $query = $this->db->join('dokumen as lpj', 'proker.lpj = lpj.idDokumen',left);
        $query = $this->db->from('proker');
        $query = $this->db->select('*, proker.jenis as jenisProker, proposal.status as statProposal, lpj.status as statLpj');
        // $query = $this->db->select('*');
        $query = $this->db->get();
        return $query->result();
	}
}
?>