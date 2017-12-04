<?php class C_Proker extends CI_Controller {
	// public function index(){
	// 	echo "C_Dokumen";
	// }
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Proker');
		$this->load->model('M_Dokumen');
		// $this->load->controller("C_Organisasi");
	}

	public function hapusProker($idProker){
		$this->db->where('idProker', $idProker);
		$this->db->delete('proker');
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
		redirect(base_url());
		// $this->load->view('view_beranda_Pimpinan_Organisasi', $data);
		// $this->
	}
	// public function tambahProker($idOrganisasi){
	public function tambahProker($idOrganisasi){
		$data["idProker"] = "";
		// $data["idOrganisasi"] = $idOrganisasi;
		$data["idOrganisasi"] = $idOrganisasi;
		$data["namaProker"] = $this->input->post("namaProker");
		$data["pelaksana"] = $this->input->post("pelaksana");
		$data["waktu"] = $this->input->post("waktu");
		if ($this->input->post("jenis") == "Berproposal"){
			$data["jenis"] = 0;
		} else {
			$data["jenis"] = 1;
		}

		$allowed =  array('doc','docx' ,'pdf');
		// Upload Proposal
	  $namaProposal = $_FILES['fileProposal']['name'];
	  $sizeProposal= $_FILES["fileProposal"]["size"]/1024;
	  $tipeProposal = pathinfo($namaProposal, PATHINFO_EXTENSION);
	  $tmpNameProposal=$_FILES["fileProposal"]["tmp_name"];  
	  if(!in_array($tipeProposal,$allowed) ) {
		  echo "You can only upload a Word doc/docx or a Pdf file.";
	  } else {
			if($sizeProposal<=200){

			  //New file name
			  $random=rand(1111,9999);
			  $newFileName=$random."_Proposal_".$idOrganisasi."_".$namaProposal;

			  //File upload path
			  $uploadPath="assets/doc/".$newFileName;

			  //function for upload file
			  if(move_uploaded_file($tmpNameProposal,$uploadPath)){
					echo "Successful"; 
					echo "File Name :".$newFileName; 
					echo "File Size :".$sizeProposal." kb"; 
					echo "File Type :".$tipeProposal;
					$dataDokumen["idDokumen"] = "D001";
					$dataDokumen["namaDokumen"] = $newFileName;	
					$dataDokumen["isiDokumen"] = $newFileName;						
					$dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
					$dataDokumen["jenis"] = 0;
					$dataDokumen["status"] = 1;
					$this->M_Dokumen->insertDokumen($dataDokumen);
			  }
			}
			else{
			  echo "Maximum upload file size limit is 200 kb";
			}
	  }

		// Upload LPJ
	  $namaLpj = $_FILES['fileLpj']['name'];
	  $sizeLpj= $_FILES["fileLpj"]["size"]/1024;
	  $tipeLpj = pathinfo($namaLpj, PATHINFO_EXTENSION);
	  $tmpNameLpj=$_FILES["fileLpj"]["tmp_name"];  
	  if(!in_array($tipeLpj,$allowed) ) {
		  echo "You can only upload a Word doc/docx or a Pdf file.";
	  } else {
			if($sizeLpj<=200){

			  //New file name
			  $random=rand(1111,9999);
			  $newFileName=$random."_LPJ_".$idOrganisasi."_".$namaLpj;

			  //File upload path
			  $uploadPath="assets/doc/".$newFileName;

			  //function for upload file
			  if(move_uploaded_file($tmpNameLpj,$uploadPath)){
					echo "Successful"; 
					echo "File Name :".$newFileName; 
					echo "File Size :".$sizeLpj." kb"; 
					echo "File Type :".$tipeLpj; 
					$dataDokumen["idDokumen"] = "D001";
					$dataDokumen["namaDokumen"] = $newFileName;	
					$dataDokumen["isiDokumen"] = $newFileName;						
					$dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
					$dataDokumen["jenis"] = 1;
					$dataDokumen["status"] = 1;
					$this->M_Dokumen->insertDokumen($dataDokumen);
			  }
			}
			else{
			  echo "Maximum upload file size limit is 200 kb";
			}
	  }	   
		
		$data["proposal"] = $this->M_Dokumen->getLatestDokumen(0)->idDokumen;
		$data["lpj"] = $this->M_Dokumen->getLatestDokumen(1)->idDokumen;		
		$this->M_Proker->insertProker($data);
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
		// echo "<script type='text/javascript'>alert('Tambah Program Kerja Sukses');</script>";
		// alert("Tambah Program Kerja Sukses");
		redirect(base_url());
	}
	public function ubahProker($idProker){
		$data["idProker"] = $idProker;
		// $data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		$data["namaProker"] = $this->input->post("namaProker");
		$data["pelaksana"] = $this->input->post("pelaksana");
		$data["waktu"] = $this->input->post("waktu");
		if ($this->input->post("jenis") == "Berproposal"){
			$data["jenis"] = 0;
		} else {
			$data["jenis"] = 1;
		}		
		// $data["proposal"] = ;
		// $data["lpj"] = "";
		$this->M_Proker->updateProker($data,$idProker);
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
		// echo "<script type='text/javascript'>alert('Tambah Program Kerja Sukses');</script>";
		// alert("Tambah Program Kerja Sukses");
		redirect(base_url());
	}
}
?>