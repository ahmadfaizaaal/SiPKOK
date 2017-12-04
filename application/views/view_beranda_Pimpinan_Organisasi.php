<?php
    $isLogin = $this->session->userdata( 'akunAktif' );
    if($isLogin==""){
      redirect( base_url().'Auth');
    }    
?>
<script type="text/javascript">
//   var $prokerAktif = $this->session->userdata('proker')[0];
  
</script>
<html>
<head>
    <title><?php echo $judul; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url() ?>assets/img/SIPKOK.png" rel="shortcut icon">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    </style>
</head>
<body class="w3-light-blue w3-content" style="max-width:1600px">

<?php class ModalView {
  public $selection;
  public $idProkerTerpilih;
  public function __construct($selection){
      $this->selection = $selection;
  }
  public function setIdProker($idProkerTerpilih) {
      $this->idProkerTerpilih = $idProkerTerpilih;
  }
  public function getIdProker() {
      return $this->idProkerTerpilih;
  }
  public function loadModal() {
      if ($this->selection == 'tambahproker') {
          $judul = "Tambah program kerja";
      } else {
          $judul = "Ubah program kerja";
      }
      echo "<div id=\"".$this->selection."\" class=\"w3-modal\">
            <div class=\"w3-modal-content w3-animate-zoom w3-card-4\">
                <div class=\"w3-card-4\">
                  <div class=\"w3-container w3-green\">
                      <h3>".$judul."</b></h3>
                      <span onclick=\"document.getElementById('$this->selection').style.display='none'\" class=\"w3-button w3-xlarge w3-display-topright w3-hover-green\">&times;</span>
                  </div>
                  <form class=\"w3-container\" action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\" name=\"form1\">
                      <table class=\"w3-table w3-bordered-white\">
                          <tr><td></td></tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5>Nama program kerja</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 65%;\"><h5><input class=\"w3-input\" type=\"text\" value=\"\"></h5></td>
                          </tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5>Nama ketua pelaksana</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 65%;\"><h5><input class=\"w3-input\" type=\"text\"></h5></td>
                          </tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5>Perkiraan waktu pelaksanaan</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 65%;\"><h5><input class=\"w3-input\" type=\"text\"></h5></td>
                          </tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5>Jenis program kerja</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 65%;\"><h5>
                                  <select class=\"w3-small w3-card\" id=\"dropdown-option\" style=\"height: 20%;\">
                                    <option value=\"Berproposal\">Berproposal</option>
                                    <option value=\"Tanpa proposal\">Tanpa proposal</option>
                                  </select>
                              </h5></td>
                          </tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5>Unggah proposal</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 65%;\"><h5><input class=\"w3-small\" type=\"file\" name=\"resume\" id=\"resume\"></h5></td>
                          </tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5>Unggah LPJ</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 65%;\"><h5><input class=\"w3-small\" type=\"file\" name=\"resume\" id=\"resume\"></h5></td>
                          </tr>
                          <tr>
                              <td style=\"width: 33%;\"><h5></h5></td><td style=\"width: 2%;\"><h5></h5></td><td style=\"width: 65%;\" class=\"w3-right-align w3-small\"><button class=\"w3-btn w3-green w3-card\">Tambahkan</button></td>
                          </tr>
                          <tr><td></td></tr>
                      </table>
                  </form>
                </div>  
            </div>
        </div>";
  }
}

$modalViewTambah = new ModalView("tambahproker");
$modalViewUbah = new ModalView("ubahproker");


 ?>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-amber w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-center">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-tiny w3-padding w3-hover-orange" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo base_url() ?>assets/img/logo-hmif2.png" style="width:80%;" class="w3-round"><br><br>
<<<<<<< HEAD
    <h4><b><?php echo $this->session->userdata('organisasi')->namaOrganisasi ?></b></h4>
    <p class="w3-text-white"><b><i><?php echo $this->session->userdata('organisasi')->kepanjangan ?></i></b></p>
=======
    <h4><b><?php echo $this->session->userdata('organisasi')->namaOrganisasi?></b></h4>
    <p class="w3-text-white"><b><i><?php echo $this->session->userdata('organisasi')->kepanjangan?></i></b></p>
>>>>>>> d0cf4976fa2f8d7713ae7563f69890a60d2f6de0
  </div>
  <div class="w3-bar-block">
    <!-- <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button  w3-hover-light-blue w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a> --> 
    <a href="" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-orange w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i><?php echo $this->session->userdata('akunAktif')->nama?></a> 
    <a href="" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-orange w3-padding w3-hover-blue"><i class="fa fa-INFO-CIRCLE fa-fw w3-margin-right"></i><?php echo $this->session->userdata('akunAktif')->jabatan?></a>
    <a href="<?php echo base_url('Auth/index') ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-orange w3-padding w3-hover-blue"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">


  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="<?php echo base_url() ?>assets/img/logo-hmif2.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-blue" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
        <!-- <h1><b>My Portfolio</b></h1> -->
        <h1 class="w3-right-align"><img src="<?php echo base_url() ?>assets/img/detail-logo-glowing4.png" style="width:100%;" class="w3-round"></h1>
        <div class="w3-bar w3-bottombar w3-border-white w3-padding-16 w3-margin-bottom" id="proker">
        <a href="#proker"><button class="w3-bar-item w3-button w3-amber w3-hover-orange w3-border" style="width:33.3%"><i class=" fa fa-tasks w3-margin-right"></i>Program Kerja</button></a>
        <a href="#profil"><button class="w3-bar-item w3-button w3-amber w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-user w3-margin-right"></i>Profil Organisasi</button></a>
        <a href="#dokumen"><button class="w3-bar-item w3-button w3-amber w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-file-text-o w3-margin-right"></i>Dokumen</button></a>
        </div>
        <div class="w3-col m8">
            <h2 class="w3-left-align">Program Kerja</h2>
        </div>
        <div class="w3-col m4  w3-margin-top w3-right-align">
            <button onclick="document.getElementById('tambahproker').style.display='block'" class="w3-btn w3-amber w3-hover-orange w3-card-4" title="Tambah program kerja"><i class="fa fa-plus w3-margin-right"></i>Tambah program kerja</button>
        </div>
        <?php $modalViewTambah->loadModal(); ?>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
      <!-- <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-blue" style="height: 7%;">
              <div class="w3-col m6"><h4 class="w3-left-align w3-margin-left">IF ELSE</h4></div>
              <div class="w3-col m6 w3-right-align w3-padding">
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Ubah program kerja"><i class="fa fa-pencil"></i></button>
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Hapus program kerja"><i class=" fa fa-trash"></i></button> 
              </div>
          </div>
          <div class="w3-container w3-blue">
              <div class="w3-col m3 w3-margin-top">
                  <img src="<?php echo base_url() ?>assets/img/BP.png" alt="Norway" style="width:100%"class="w3-hover-opacity"> -->
<<<<<<< HEAD
      <?php 
          foreach ($this->session->userdata('proker') as $programKerja) {
=======
      <?php $i = 0; foreach ($this->session->userdata('proker') as $programKerja) {
>>>>>>> d0cf4976fa2f8d7713ae7563f69890a60d2f6de0
          $namaProker_cut = $programKerja->namaProker;
          if (strlen($programKerja->namaProker) > 15) {
              $namaProker_cut = substr($programKerja->namaProker, 0, 15)." ...";
          }
          $modalViewUbah->loadModal();
      echo 
      "<div class=\"w3-third w3-container w3-margin-bottom\">
          <div class=\"w3-blue\" style=\"height: 7%;\">
              <div class=\"w3-col m7\"><h4 class=\"w3-left-align w3-margin-left\" title=\"$programKerja->namaProker\">".$namaProker_cut."</h4></div>
              <div class=\"w3-col m5 w3-right-align w3-padding\">
<<<<<<< HEAD
                  <button onclick=\"document.getElementById('ubahproker').style.display='block'\" class=\"w3-btn w3-tiny w3-red w3-hover-white w3-card-4\" title=\"Ubah program kerja\"><i class=\"fa fa-pencil\"></i></button>
                  <button class=\"w3-btn w3-tiny w3-red w3-hover-white w3-card-4\" title=\"Hapus program kerja\"><a href=\"".base_url("C_Proker/hapusProker/$programKerja->idProker")."\"><i class=\" fa fa-trash\"></i></a></button> 
=======
                  <button class=\"w3-btn w3-tiny w3-red w3-hover-white w3-card-4 btnEditProker\" title=\"Ubah program kerja\" id=\"btnEditProker\"><i class=\"fa fa-pencil\"></i></button>
                  <button class=\"w3-btn w3-tiny w3-red w3-hover-white w3-card-4\" title=\"Hapus program kerja\"><a href=\"".base_url("C_Proker/hapusProker/$programKerja->idProker")."\"><i class=\" fa fa-trash\"></i></a></button>
>>>>>>> d0cf4976fa2f8d7713ae7563f69890a60d2f6de0
              </div>
          </div>
          <div class=\"w3-container w3-blue\">
              <div class=\"w3-col m3 w3-margin-top\">
                  <img src=\"";
                  if ($programKerja->jenisProker == 0) {
                    echo base_url()."assets/img/BP.png";                    
                  } else {
                    echo base_url()."assets/img/NP.png";
                  }
                  echo 
                  "\" alt=\"Norway\" style=\"width:100%\"class=\"w3-hover-opacity\">
              </div>
              <div class=\"w3-col m9\">
                  <div class=\"w3-container w3-margin-top\">
                      <table class=\"w3-table w3-tiny w3-bordered w3-text-white\">
                          <tr>
                              <td><p>Ketua</p></td><td><p>: ".$programKerja->pelaksana."</p></td>
                          </tr>
                          <tr>
                              <td><p>Waktu</p></td><td><p>: ".$programKerja->waktu."</p></td>
                          </tr>
                          <tr>
                              <td><p>Jenis</p></td><td><p>: ";
                              if ($programKerja->jenisProker == 0) {
                                echo "Berproposal";
                              } else {
                                echo "Tanpa Proposal";
                              }
                              echo
                              "</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class=\"w3-light-gray w3-small w3-center \">";
            if ($programKerja->statProposal == 0){
              echo "<div class=\"w3-container w3-padding-small w3-light-gray w3-center\" style=\"width:0%;\">0%</div>";
            } else {
              echo "<div class=\"w3-container w3-padding-small w3-green w3-center\" style=\"width:";
              if ($programKerja->statProposal == 2){
                if ($programKerja->statLpj == 2){
                  echo "100%";
                } else if ($programKerja->statLpj == 1){
                  echo "75%";
                } else {
                  echo "50%";
                }
              } else if ($programKerja->statProposal == 1){
                echo "25%";
              } else {
                echo "0%";
              }
              echo ";\">";
              if ($programKerja->statProposal == 2){
                if ($programKerja->statLpj == 2){
                  echo "100% ";
                } else if ($programKerja->statLpj == 1){
                  echo "75%";
                } else {
                  echo "50%";
                }
              } else if ($programKerja->statProposal == 1){
                echo "25%";
              } 
              echo "</div>";
            }
          echo "</div>
          <script>
            document.getElementsByClassName('btnEditProker')[$i].onclick = function() {editProker(\"".$programKerja->namaProker."\",\"".$programKerja->pelaksana."\",\"".$programKerja->waktu."\",".$programKerja->jenisProker.")};
          </script>
      </div>";
      $i++;
      } ?>
  </div>

  <?php 
      function tambahProker() {
          $modalView = new ModalView("tambahproker");
          $modalView->showModal();
          // $dom = "document.getElementById('tambahproker').style.display='block'";
          // return $dom;
      }
      function ubahProker() {
          $modalView = new ModalView("ubahproker");
          $dom = "document.getElementById('ubahproker').style.display='block'";
          $modalView->showModal();
          return $dom;
      }
  ?>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <!-- <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a> -->
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>

  <!-- Line bridge -->
  <div class="w3-container" id="profil">
      <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <div class="w3-col m8">
              <h2 class="w3-left-align">Profil Organisasi</h2>
          </div>
          <div class="w3-col m4  w3-margin-top w3-right-align">
              <button class="w3-btn w3-amber w3-hover-orange w3-card-4" title="Ubah profil organisasi"><i class="fa fa-pencil w3-margin-right"></i>Ubah profil</button>
          </div>
      </div>
  </div>

  <!-- Images of Me -->
  <div class="w3-row-padding w3-padding-16">
    <!-- <div class="w3-col m6">
      <img src="<?php //echo base_url() ?>assets/img/detail-logo.png" alt="Me" style="width:100%">
    </div> -->
    <div class="w3-center">
      <img src="<?php echo base_url() ?>assets/img/logo-hmif2.png" alt="Me" style="width:20%">
    </div>
  </div>

  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <!-- <h4><b>Nama Organisasi</b></h4> -->
    <table class="w3-table w3-bordered">
      <?php 
      // $idOrganisasi = $this->session->userdata('akunAktif')->organisasi;
      // $organisasi = base_url("C_Organisasi/getOrganisasi/$idOrganisasi");
      // $organisasi = base_url("C_Organisasi/getOganisasi/".$this->session->userdata('akunAktif')->organisasi."");
      echo
        "<tr>
            <td style=\"width: 20%;\"><h5>Nama Organisasi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>".$this->session->userdata('organisasi')->namaOrganisasi."</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Kepanjangan</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>".$this->session->userdata('organisasi')->kepanjangan."</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Nama Ketua</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>".$this->session->userdata('organisasi')->namaKetua."</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Visi Misi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>".$this->session->userdata('organisasi')->visiMisi."</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Struktur Organisasi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5><div class=\"w3-card-4\"><img src=\"".base_url()."assets/img/struktur.png\" alt=\"Struktur\" style=\"width:100%\"></div></h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Progress Organisasi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td>
            <td style=\"width: 78%;\">
                <div class=\"w3-white w3-margin-top\">
                    <div class=\"w3-container w3-green w3-padding w3-center\" style=\"width:75%\">75%</div>
                </div>
            </td>
        </tr>"
      ?>
    </table>    
  </div>

<!-- DOKUMEN -->
  <!-- Line bridge -->
  <div class="w3-container" id="dokumen">
      <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <div class="w3-col m8">
              <h2 class="w3-left-align">Dokumen</h2>
          </div>
          <div class="w3-col m4 w3-right-align">
              <div class="w3-panel w3-white w3-round-xlarge w3-border w3-small">
                  <div class="w3-col m10">
                      <form class="w3-white">
                          <p><input class="w3-input" type="text" placeholder="Cari dokumen"></p>
                      </form>
                  </div>
                  <div class="w3-col m2 w3-margin-top">
                      <button class="w3-btn w3-round w3-small w3-amber w3-hover-orange w3-card-4" title="Cari dokumen"><a href="#"><i class=" fa fa-search"></i></a></button>
                  </div>
              </div>
          </div>
      </div>
      
      <!-- Content dokumen -->
      <!-- Proposal -->
      <h4>Proposal Kegiatan Organisasi</h4>
      <div align="right">
        <?php 
          foreach ($this->session->userdata('proker') as $programKerja) {
            if ($programKerja->statProposal != 0){          
          echo "<div class=\"w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card\" style=\"width: 95%;\">
              <div class=\"w3-col m10 w3-margin-top\">
                  <div class=\"w3-col m1 w3-center w3-margin-bottom\">
                      <img src=\""; echo base_url()."assets/img/pdf.png"; echo "\" alt=\"Norway\" style=\"width:60%\"class=\"w3-hover-opacity\">
                  </div>
                  <div class=\"w3-col m11 w3-left-align\"><h6>".$programKerja->namaProposal."</h6></div>
              </div>
              <div class=\"w3-col m2 w3-margin-top w3-right-align\">
                  <button";
                  if ($programKerja->statProposal == 1){
                    echo " class=\"w3-btn w3-tiny w3-amber w3-hover-light-gray w3-card\" style=\"width: 75%;\" title=\"Status program kerja\"><i class=\"fa fa-hourglass-half w3-margin-right\"></i>Dalam Proses"; 
                  } else if ($programKerja->statProposal == 2){
                    echo " class=\"w3-btn w3-tiny w3-green w3-hover-light-gray w3-card\" style=\"width: 75%;\" title=\"Status program kerja\"><i class=\"fa fa-check w3-margin-right\"></i>Disetujui"; 
                  } else {
                    echo " class=\"w3-btn w3-tiny w3-red w3-hover-light-gray w3-card\" style=\"width: 75%;\" title=\"Status program kerja\"><i class=\"fa fa-close w3-margin-right\"></i>Ditolak"; 
                  }
                  echo "</button>
              </div>
          </div>";
        }
        }
        ?>
          <!-- <div class="w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card" style="width: 95%;">
              <div class="w3-col m10 w3-margin-top">
                  <div class="w3-col m1 w3-center w3-margin-bottom">
                      <img src="<?php echo base_url() ?>assets/img/pdf.png" alt="Norway" style="width:60%"class="w3-hover-opacity">
                  </div>
                  <div class="w3-col m11 w3-left-align"><h6>Proposal kegiatan studi ekskursif Informatika 2017</h6></div>
              </div>
              <div class="w3-col m2 w3-margin-top w3-right-align">
                  <button class="w3-btn w3-tiny w3-red w3-hover-light-gray w3-card" style="width: 75%;" title="Status program kerja"><i class="fa fa-close w3-margin-right"></i>Ditolak</button>
              </div>
          </div>
          <div class="w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card" style="width: 95%;">
              <div class="w3-col m10 w3-margin-top">
                  <div class="w3-col m1 w3-center w3-margin-bottom">
                      <img src="<?php echo base_url() ?>assets/img/pdf.png" alt="Norway" style="width:60%"class="w3-hover-opacity">
                  </div>
                  <div class="w3-col m11 w3-left-align"><h6>Proposal kegiatan PEMILWA Informatika 2017</h6></div>
              </div>
              <div class="w3-col m2 w3-margin-top w3-right-align">
                  <button class="w3-btn w3-tiny w3-amber w3-hover-light-gray w3-card" style="width: 75%;" title="Status program kerja"><i class="fa fa-hourglass-half w3-margin-right"></i>Dalam proses</button>
              </div>
          </div> -->
      </div>
      
      <!-- Laporan pertanggung jawaban -->
      <h4>Laporan Pertanggungjawaban Kegiatan Organisasi</h4>
      <div align="right">
        <?php 
        foreach ($this->session->userdata('proker') as $programKerja) {
            if ($programKerja->statLpj != 0){          
          echo "<div class=\"w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card\" style=\"width: 95%;\">
              <div class=\"w3-col m10 w3-margin-top\">
                  <div class=\"w3-col m1 w3-center w3-margin-bottom\">
                      <img src=\""; echo base_url()."assets/img/word.png"; echo "\" alt=\"Norway\" style=\"width:60%\"class=\"w3-hover-opacity\">
                  </div>
                  <div class=\"w3-col m11 w3-left-align\"><h6>".$programKerja->namaProposal."</h6></div>
              </div>
              <div class=\"w3-col m2 w3-margin-top w3-right-align\">
                  <button";
                  if ($programKerja->statLpj == 1){
                    echo " class=\"w3-btn w3-tiny w3-amber w3-hover-light-gray w3-card\" style=\"width: 75%;\" title=\"Status program kerja\"><i class=\"fa fa-hourglass-half w3-margin-right\"></i>Dalam Proses"; 
                  } else if ($programKerja->statLpj == 2){
                    echo " class=\"w3-btn w3-tiny w3-green w3-hover-light-gray w3-card\" style=\"width: 75%;\" title=\"Status program kerja\"><i class=\"fa fa-check w3-margin-right\"></i>Disetujui"; 
                  } else {
                    echo " class=\"w3-btn w3-tiny w3-red w3-hover-light-gray w3-card\" style=\"width: 75%;\" title=\"Status program kerja\"><i class=\"fa fa-close w3-margin-right\"></i>Ditolak"; 
                  }
                  echo "</button>
              </div>
          </div>";
        }
      }
        ?>
          <!-- <div class="w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card" style="width: 95%;">
              <div class="w3-col m10 w3-margin-top">
                  <div class="w3-col m1 w3-center w3-margin-bottom">
                      <img src="<?php echo base_url() ?>assets/img/word.png" alt="Norway" style="width:60%"class="w3-hover-opacity">
                  </div>
                  <div class="w3-col m11 w3-left-align"><h6>LPJ kegiatan PEMILWA Informatika 2017</h6></div>
              </div>
              <div class="w3-col m2 w3-margin-top w3-right-align">
                  <button class="w3-btn w3-tiny w3-green w3-hover-light-gray w3-card" style="width: 75%;" title="Status program kerja"><i class="fa fa-check w3-margin-right"></i>Disetujui</button>
              </div>
          </div> -->
      </div>
      <br>

      <!-- <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <h2 class="w3-left-align">Dokumen</h2>
      </div>
      <div class="w3-col m4 w3-amber"> </div>
      <div class="w3-col m4 ">
          <div class="w3-panel w3-white w3-round-xlarge w3-border w3-small">
              <form class="w3-white">
                  <p><input class="w3-input" type="text" placeholder="Cari dokumen"></p>
              </form>
              <button class="w3-btn w3-round-large w3-small w3-amber w3-hover-orange w3-card-4" title="Hapus program kerja"><a href="#"><i class=" fa fa-search"></i></a></button>
          </div>
      </div>
      <div class="w3-col m4 w3-blue"></div> -->
  </div>

  <!-- Footer -->
  <!-- <footer class="w3-container w3-padding-32 w3-blue">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  
    <div class="w3-third">
      <h3>BLOG POSTS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">London</span>
        <span class="w3-tag w3-blue w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">DIY</span>
        <span class="w3-tag w3-blue w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">Family</span>
        <span class="w3-tag w3-blue w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">Shopping</span>
        <span class="w3-tag w3-blue w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-blue w3-small w3-margin-bottom">Games</span>
      </p>
    </div>

  </div>
  </footer> -->
  
  <div class="w3-red w3-center w3-padding-16">Dibuat oleh kelompok 1 RPL-I</div>

<!-- End page content -->
</div>

<script>
// document.getElementById('btnEdit').onclick = function() {editProker()};
// for (var i = document.getElementsByClassName('btnEditProker').length - 1; i >= 0; i--) {  
//   document.getElementsByClassName('btnEditProker')[i].onclick = function() {editProker("O001")};
// };
function editProker($namaProker, $pelaksana, $waktu, $jenisProker){
      document.getElementById("Editproker").style.display = 'block'; 
      document.getElementById('namaProker').value = $namaProker;
      document.getElementById('pelaksana').value = $pelaksana;
      document.getElementById('waktu').value = $waktu;
      if ($jenisProker == 0) {
        // document.getElementById('jenis').value = "Berproposal";
        document.getElementById('optProposal').selected = true;
      } else {
        document.getElementById('optTanpaProposal').selected = true;
        // document.getElementById('jenis').value = "Tanpa Proposal";
      };
    }
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>

</body>
</html>
