<?php class M_Dokumen extends CI_Model {
	// public function index(){
	// 	echo "M_Dokumen";
	// }
	// public function getStatus($idDokumen){
	// 	$query = $this->db->where("idDokumen",$idDokumen);
	// 	$query = $this->db->get('dokumen');
	// 	$hasil = $query->result();
	// 	return $hasil[0]->status;
	// }
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