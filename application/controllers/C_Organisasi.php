<?php class C_Organisasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Organisasi");		
		$this->load->model("M_Proker");
	}
	public function ubahProfil($idOrganisasi){
		$data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		// $data["idOrganisasi"] = $idOrganisasi;
		$data["namaOrganisasi"] = $this->input->post("namaOrganisasi");
		$data["kepanjangan"] = $this->input->post("kepanjangan");
		$data["namaKetua"] = $this->input->post("namaKetua");
		$data["visiMisi"] = $this->input->post("visiMisi");

		$allowed =  array('jpeg','jpg','png','PNG');
		// Upload Struktur
		if ($_FILES['fileStruktur']['name'] != "") {
			$namaStruktur = $_FILES['fileStruktur']['name'];
		  $sizeStruktur= $_FILES["fileStruktur"]["size"]/1024;
		  $tipeStruktur = pathinfo($namaStruktur, PATHINFO_EXTENSION);
		  $tmpNameProposal=$_FILES["fileStruktur"]["tmp_name"];  
		  if(!in_array($tipeStruktur,$allowed) ) {
			  echo "You can only upload a Word doc/docx or a Pdf file.";
		  } else {
				if($sizeStruktur<=1000){

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
				  } else {
				  	echo "gagal";
				  }
				}
				else{
				  echo "Maximum upload file size limit is 200 kb";
				}
		}
	}

		if ($_FILES['fileLogo']['name'] != "") {
		  $namaLogo = $_FILES['fileLogo']['name'];
		  $sizeLogo= $_FILES["fileLogo"]["size"]/1024;
		  $tipeLogo = pathinfo($namaLogo, PATHINFO_EXTENSION);
		  $tmpNameProposal=$_FILES["fileLogo"]["tmp_name"];  
		  if(!in_array($tipeLogo,$allowed) ) {
			  echo "You can only upload a Word doc/docx or a Pdf file.";
		  } else {
				if($sizeLogo<=1000){

				  //New file name
				  $random=rand(1111,9999);
				  $newFileName=$random."_Logo_".$idOrganisasi."_".$namaLogo;

				  //File upload path
				  $uploadPath="assets/img/".$newFileName;

				  //function for upload file
				  if(move_uploaded_file($tmpNameProposal,$uploadPath)){
						echo "Successful"; 
						echo "File Name :".$newFileName; 
						echo "File Size :".$sizeLogo." kb"; 
						echo "File Type :".$tipeLogo;
						$data["logo"] = $newFileName;
				  }
				}
				else{
				  echo "Maximum upload file size limit is 200 kb";
				}
		  }	
		  }  


		$this->M_Organisasi->updateOrganisasi($data,$idOrganisasi);
		$this->session->set_userdata(array('organisasi'=>$this->M_Organisasi->selectOrganisasi($this->session->userdata('akunAktif')->organisasi)),true);
		redirect(base_url());
		
	}
	public function hapusOrganisasi($idOrganisasi){
		$this->M_Organisasi->deleteOrganisasi($idOrganisasi);
		$this->session->set_userdata(array('organisasi'=>$this->M_Organisasi->selectOrganisasiAll(),true));
		redirect(base_url("C_Akun/admin"));
	}
	public function tambahOrganisasi(){
		$data["idOrganisasi"] = "";
		$data["namaOrganisasi"] = $this->input->post("namaOrganisasi");
		$data["kepanjangan"] = $this->input->post("kepanjangan");		
		$data["namaKetua"] = $this->input->post("namaKetua");
		$data["visiMisi"] = "Belum Didefinisikan";
		$data["logo"] = "SIPKOK.png";
		$data["struktur"] = "struktur.png";
		if ($this->input->post("kategori") == "HMP"){
			$data["kategori"] = 0;
		} else if ($this->input->post("kategori") == "LSO"){
			$data["kategori"] = 1;
		} else {
			$data["kategori"] = 2;
		}
		$data["progress"] = 0;
		$this->M_Organisasi->insertOrganisasi($data);
		$this->session->set_userdata(array('organisasi'=>$this->M_Organisasi->selectOrganisasiAll(),true));
		// echo $data;
		redirect(base_url("C_Akun/admin"));
	}
	public function lihatDetailOrganisasi($idOrganisasi) {
		$judul = "SiPKOK";
		$data['judul'] = $judul;
		$this->session->set_userdata(array(
			'detailOrganisasi'=>$this->M_Organisasi->selectOrganisasi($idOrganisasi),
			'prokerDetailOrganisasi'=>$this->M_Proker->selectProkerJoinDokumen($idOrganisasi)),true);
		$this->load->view('view_detail_organisasi', $data);	
	}
}

?>