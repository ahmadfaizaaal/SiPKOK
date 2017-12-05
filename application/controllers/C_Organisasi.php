<?php class C_Organisasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Organisasi");		
		$this->load->model("M_Proker");
	}
	// public function index(){
	// 	echo "C_Organisasi";
	// }
	
	// public function getOrganisasi($idOrganisasi){
	// 	$organisasi = $this->M_Organisasi->selectOrganisasi($idOrganisasi);
	// 	return $organisasi[0];
	// }
	public function ubahProfil($idOrganisasi){
		$data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		$data["namaOrganisasi"] = $this->input->post("namaOrganisasi");
		$data["kepanjangan"] = $this->input->post("kepanjangan");
		$data["namaKetua"] = $this->input->post("namaKetua");
		$data["visiMisi"] = $this->input->post("visiMisi");

		$allowed =  array('jpg','png');
		// Upload Proposal
	  $namaStruktur = $_FILES['fileStruktur']['name'];
	  $sizeStruktur= $_FILES["fileStruktur"]["size"]/1024;
	  $tipeStruktur = pathinfo($namaStruktur, PATHINFO_EXTENSION);
	  $tmpNameProposal=$_FILES["fileStruktur"]["tmp_name"];  
	  if(!in_array($tipeStruktur,$allowed) ) {
		  echo "You can only upload a Word doc/docx or a Pdf file.";
	  } else {
			if($sizeStruktur<=200){

			  //New file name
			  $random=rand(1111,9999);
			  $newFileName=$random."_Struktur_".$idOrganisasi."_".$namaStruktur;

			  //File upload path
			  $uploadPath="assets/img/".$newFileName;

			  //function for upload file
			  if(move_uploaded_file($tmpNameProposal,$uploadPath)){
					echo "Successful"; 
					echo "File Name :".$newFileName; 
					echo "File Size :".$sizeStruktur." kb"; 
					echo "File Type :".$tipeStruktur;
					$data["struktur"] = $newFileName;
					// $dataDokumen["idDokumen"] = "D001";
					// $dataDokumen["namaDokumen"] = $newFileName;	
					// $dataDokumen["isiDokumen"] = $newFileName;						
					// $dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
					// $dataDokumen["jenis"] = 0;
					// $dataDokumen["status"] = 1;
					// $this->M_Dokumen->insertDokumen($dataDokumen);
			  }
			}
			else{
			  echo "Maximum upload file size limit is 200 kb";
			}
	  }


		$this->M_Organisasi->updateOrganisasi($data,$idOrganisasi);
		$this->session->set_userdata(array('organisasi'=>$this->M_Organisasi->selectOrganisasi($this->session->userdata('akunAktif')->organisasi)),true);
		// echo "<script type='text/javascript'>alert('Tambah Program Kerja Sukses');</script>";
		// alert("Tambah Program Kerja Sukses");
		redirect(base_url());
	}
}
?>