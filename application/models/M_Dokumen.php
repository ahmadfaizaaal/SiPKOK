<?php class M_Dokumen extends CI_Model {
	
	public function selectDokumenAll(){
		$query = $this->db->get('dokumen');
		return $query->result();
	}
	public function insertDokumen($data){
		$this->db->insert("dokumen", $data);
	}
	public function updateDokumen($data, $idDokumen){
		$query = $this->db->where('idDokumen',$idDokumen);
        $query = $this->db->update('dokumen',$data);
	}
	public function getLatestDokumen($jenis){
		$query = $this->db->where('jenis',$jenis);        
        $query = $this->db->order_by("idDokumen", "desc");
        $query = $this->db->get('dokumen');
        return $query->result()[0];
	}	
}
?>