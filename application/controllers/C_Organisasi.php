<?php class C_Organisasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("M_Organisasi");		
		$this->load->model("M_Proker");
	}
	public function ubahProfil($idOrganisasi){
		$data["idOrganisasi"] = $idOrganisasi;
		$data["namaOrganisasi"] = $this->input->post("namaOrganisasi");
		$data["kepanjangan"] = $this->input->post("kepanjangan");
		$data["namaKetua"] = $this->input->post("namaKetua");
		$data["visiMisi"] = $this->input->post("visiMisi");

		$allowed =  array('jpeg','jpg','png', 'JPEG', 'JPG','PNG');
		if ($_FILES['fileStruktur']['name'] != "") {
		  $namaStruktur = $_FILES['fileStruktur']['name'];
		  $sizeStruktur= $_FILES["fileStruktur"]["size"]/1024;
		  $tipeStruktur = pathinfo($namaStruktur, PATHINFO_EXTENSION);
		  $tmpNameStruktur=$_FILES["fileStruktur"]["tmp_name"];  
		  if(!in_array($tipeStruktur,$allowed) ) {
		  	  echo "<script>
						alert(\"Hanya bisa mengunggah file dengan ekstensi jpeg/jpg/PNG!\");
					</script>";
		  } else {
				if($sizeStruktur>0){

				  //--NEW FILE NAME
				  $random=rand(1111,9999);
				  $newFileName=$random."_Struktur_".$idOrganisasi."_".$namaStruktur;

				  //--FILE UPLOAD PATH
				  $uploadPath="assets/img/".$newFileName;

				  //--FUNCTION FOR UPLOAD FILE
				  if(move_uploaded_file($tmpNameStruktur,$uploadPath)){
						$data["struktur"] = $newFileName;
						echo "<script>
							alert(\"Perubahan berhasil disimpan!\");
						</script>";
				  }
				} else if ($sizeStruktur == 0){
				  echo "<script>
						alert(\"Ukuran file maksimal sebesar 2 MB!\");
					</script>";
				}
		}
	}

		if ($_FILES['fileLogo']['name'] != "") {
		  $namaLogo = $_FILES['fileLogo']['name'];
		  $sizeLogo= $_FILES["fileLogo"]["size"]/1024;
		  $tipeLogo = pathinfo($namaLogo, PATHINFO_EXTENSION);
		  $tmpNameLogo=$_FILES["fileLogo"]["tmp_name"];  
		  if(!in_array($tipeLogo,$allowed) ) {
			  echo "<script>
						alert(\"Hanya bisa mengunggah file dengan ekstensi jpeg/jpg/PNG!\");
					</script>";
		  } else {
				if($sizeLogo>0){
				  //--NEW FILE NAME
				  $random=rand(1111,9999);
				  $newFileName=$random."_Logo_".$idOrganisasi."_".$namaLogo;

				  //--FILE UPLOAD PATH
				  $uploadPath="assets/img/".$newFileName;

				  //--FUNCTION FOR UPLOAD FILE
				  if(move_uploaded_file($tmpNameLogo,$uploadPath)){
						$data["logo"] = $newFileName;
						echo "<script>
							alert(\"Perubahan berhasil disimpan!\");
						</script>";
				  }
				} else if ($sizeLogo == 0){
				  echo "<script>
						alert(\"Ukuran file maksimal sebesar 2 MB!\");
					</script>";
				}
		  }	
		  }  


		$this->M_Organisasi->updateOrganisasi($data,$idOrganisasi);
		$this->session->set_userdata(array('organisasi'=>$this->M_Organisasi->selectOrganisasi($this->session->userdata('akunAktif')->organisasi)),true);
		redirect(base_url(), 'refresh');
		
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