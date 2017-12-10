<?php class C_Proker extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Proker');
		$this->load->model('M_Dokumen');
	}

	public function hapusProker($idProker){
		$this->M_Proker->deleteProker($idProker);
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
		redirect(base_url());
	}
	
	public function tambahProker($idOrganisasi){
		$data["idProker"] = "";
		$data["idOrganisasi"] = $idOrganisasi;
		$data["namaProker"] = $this->input->post("namaProker");
		$data["pelaksana"] = $this->input->post("pelaksana");
		$data["waktu"] = $this->input->post("waktu");
		$data["progress"] = 0;
		if ($this->input->post("jenis") == "Berproposal"){
			$data["jenis"] = 0;
		} else {
			$data["jenis"] = 1;
		}


		$allowed =  array('doc','docx','pdf');

		if ($_FILES) {
		  // UPLOAD PROPOSAL
		  $namaProposal = $_FILES['fileProposal']['name'];
		  $sizeProposal= $_FILES["fileProposal"]["size"]/1024;
		  $tipeProposal = pathinfo($namaProposal, PATHINFO_EXTENSION);
		  $tmpNameProposal=$_FILES["fileProposal"]["tmp_name"];  
		  if(!in_array($tipeProposal,$allowed) ) {
			  echo "<script>
						alert(\"Hanya bisa mengunggah file dengan ekstensi .doc/.docx/.pdf!\");
			  		</script>";
		  } else {
				if($sizeProposal > 0){

				  //--NEW FILE NAME
				  $random=rand(1111,9999);
				  $newFileName=$random."_Proposal_".$idOrganisasi."_".$namaProposal;

				  //--FILE UPLOAD PATH
				  $uploadPath="assets/doc/".$newFileName;

				  //--FUNCTION FOR UPLOAD FILE
				  if(move_uploaded_file($tmpNameProposal,$uploadPath)){
						$dataDokumen["idDokumen"] = "D001";
						$dataDokumen["namaDokumen"] = $newFileName;										
						$dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
						$dataDokumen["jenis"] = 0;
						$dataDokumen["status"] = 1;
						$this->M_Dokumen->insertDokumen($dataDokumen);
						$data["proposal"] = $this->M_Dokumen->getLatestDokumen(0)->idDokumen;
				  }
				} else if ($sizeProposal == 0){
				  	echo "<script>
							  alert(\"Ukuran file maksimal sebesar 2 MB!\");
						  </script>";
				}
		  }

		  // UPLOAD LPJ
		  $namaLpj = $_FILES['fileLpj']['name'];
		  $sizeLpj= $_FILES["fileLpj"]["size"]/1024;
		  $tipeLpj = pathinfo($namaLpj, PATHINFO_EXTENSION);
		  $tmpNameLpj=$_FILES["fileLpj"]["tmp_name"];  
		  if(!in_array($tipeLpj,$allowed) ) {
			  echo "<script>
						alert(\"Hanya bisa mengunggah file dengan ekstensi .doc/.docx/.pdf!\");
			  		</script>";
		  } else {
				if($sizeLpj > 0){

				  //--NEW FILE NAME
				  $random=rand(1111,9999);
				  $newFileName=$random."_LPJ_".$idOrganisasi."_".$namaLpj;

				  //--FILE UPLOAD PATH
				  $uploadPath="assets/doc/".$newFileName;

				  //--FUNCTION FOR UPLOAD FILE
				  if(move_uploaded_file($tmpNameLpj,$uploadPath)){
						$dataDokumen["idDokumen"] = "D001";
						$dataDokumen["namaDokumen"] = $newFileName;											
						$dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
						$dataDokumen["jenis"] = 1;
						$dataDokumen["status"] = 1;
						$this->M_Dokumen->insertDokumen($dataDokumen);
						$data["lpj"] = $this->M_Dokumen->getLatestDokumen(1)->idDokumen;		
				  }
				} else if ($sizeLpj == 0){
				  	echo "<script>
						  alert(\"Ukuran file maksimal sebesar 2 MB!\");
					</script>";
				}
		  }	
			$this->M_Proker->insertProker($data);
			$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
			redirect(base_url(), 'refresh');
		}
	}

	public function ubahProker(){
		$idProker = $this->session->userdata('proker')[(int)$this->input->post("btnUbahProker")]->idProker;
		$idOrganisasi= $this->session->userdata('proker')[(int)$this->input->post("btnUbahProker")]->idOrganisasi;
		$data["namaProker"] = $this->input->post("namaProker");
		$data["pelaksana"] = $this->input->post("pelaksana");
		$data["waktu"] = $this->input->post("waktu");
		if ($this->input->post("jenis") == "Berproposal"){
			$data["jenis"] = 0;
		} else {
			$data["jenis"] = 1;
		}

		$allowed =  array('doc','docx' ,'pdf');
	  $namaProposal = $_FILES['fileProposal']['name'];
	  $sizeProposal= $_FILES["fileProposal"]["size"]/1024;
	  $tipeProposal = pathinfo($namaProposal, PATHINFO_EXTENSION);
	  $tmpNameProposal=$_FILES["fileProposal"]["tmp_name"];  
	  if(!in_array($tipeProposal,$allowed) ) {
		  echo "<script>
					alert(\"Hanya bisa mengunggah file dengan ekstensi .doc/.docx/.pdf!\");
			  	</script>";
	  } else {
			if($sizeProposal > 0){
			  //--NEW FILE NAME
			  $random=rand(1111,9999);
			  $newFileName=$random."_Proposal_".$idOrganisasi."_".$idProker."_".$namaProposal;

			  //--UPLOAD FILE PATH
			  $uploadPath="assets/doc/".$newFileName;

			  //--FUNCTION FOR UPLOAD FILE
			  if(move_uploaded_file($tmpNameProposal,$uploadPath)){
					$dataDokumen["idDokumen"] = "D001";
					$dataDokumen["namaDokumen"] = $newFileName;											
					$dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
					$dataDokumen["jenis"] = 0;
					$dataDokumen["status"] = 1;
					$dataProposal["status"] = 3;
					$idProposal = $this->session->userdata('proker')[(int)$this->input->post("btnUbahProker")]->idProposal;
					$this->M_Dokumen->insertDokumen($dataDokumen);
					$this->M_Dokumen->updateDokumen($dataProposal, $idProposal);
					$data["proposal"] = $this->M_Dokumen->getLatestDokumen(0)->idDokumen;
					echo "<script>
							alert(\"Perubahan berhasil disimpan!\");
						  </script>";
			  }
			}
			else{
			  echo "<script>
						  alert(\"Ukuran file maksimal sebesar 2 MB!\");
					</script>";
			}
	  }

	  // Upload LPJ
	  $namaLpj = $_FILES['fileLpj']['name'];
	  $sizeLpj= $_FILES["fileLpj"]["size"]/1024;
	  $tipeLpj = pathinfo($namaLpj, PATHINFO_EXTENSION);
	  $tmpNameLpj=$_FILES["fileLpj"]["tmp_name"];  
	  if(!in_array($tipeLpj,$allowed) ) {
		 echo "<script>
					alert(\"Hanya bisa mengunggah file dengan ekstensi .doc/.docx/.pdf!\");
			  	</script>";
	  } else {
			if($sizeLpj > 0){
			  //--NEW FILE NAME
			  $random=rand(1111,9999);
			  $newFileName=$random."_LPJ_".$idOrganisasi."_".$idProker."_".$namaLpj;

			  //--FILE UPLOAD PATH
			  $uploadPath="assets/doc/".$newFileName;

			  //--FUNCTION FOR UPLOAD FILE
			  if(move_uploaded_file($tmpNameLpj,$uploadPath)){
					$dataDokumen["idDokumen"] = "D001";
					$dataDokumen["namaDokumen"] = $newFileName;											
					$dataDokumen["waktuUpload"] = date("Y-m-d h:i:sa");
					$dataDokumen["jenis"] = 1;
					$dataDokumen["status"] = 1;				
					$dataLpj["status"] = 3;
					$idLpj = $this->session->userdata('proker')[(int)$this->input->post("btnUbahProker")]->idLpj;
					$this->M_Dokumen->insertDokumen($dataDokumen);
					$this->M_Dokumen->updateDokumen($dataLpj, $idLpj);
					$data["lpj"] = $this->M_Dokumen->getLatestDokumen(1)->idDokumen;
					echo "<script>
							alert(\"Perubahan berhasil disimpan!\");
						  </script>";		
			  }
			}
			else{
			  echo "<script>
						  alert(\"Ukuran file maksimal sebesar 2 MB!\");
					</script>";
			}
	  }	
		$this->M_Proker->updateProker($data,$idProker);
		$this->session->set_userdata(array('proker'=>$this->M_Proker->selectProkerJoinDokumen($this->session->userdata('akunAktif')->organisasi)),true);
		redirect(base_url(), 'refresh');
	}
}
?>