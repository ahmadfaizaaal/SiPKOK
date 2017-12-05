<?php
    $isLogin = $this->session->userdata( 'akunAktif' );
    if($isLogin==""){
      redirect( base_url().'Auth');
    }
    $timeLimit = "2017-12-10 00:00:00";
?>

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
<body class="w3-khaki w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-orange w3-animate-left" style="z-index:3;width:300px;" id="mySide"><br>
  <div class="w3-container w3-center">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-tiny w3-padding w3-hover-amber" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo base_url() ?>assets/img/logoBEM.png" style="width:60%;" class="w3-round"><br><br>
    <h4><b>BEM FILKOM</b></h4>
    <p class="w3-text-white"><b><i>Badan Eksekutif Mahasiswa</i></b></p>
  </div>
  <div class="w3-bar-block">
    <!-- <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button  w3-hover-light-blue w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a> --> 
    <a href="" class="w3-bar-item w3-button w3-hover-amber w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i><?php echo $this->session->userdata('akunAktif')->nama?></a> 
    <a href="" class="w3-bar-item w3-button w3-hover-amber w3-padding"><i class="fa fa-INFO-CIRCLE fa-fw w3-margin-right"></i><?php echo $this->session->userdata('akunAktif')->jabatan?></a>
    <a href="<?php echo base_url('Auth/index') ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-amber w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay2"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">


  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="<?php echo base_url() ?>assets/img/logoBEM.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-amber" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
        <!-- <h1><b>My Portfolio</b></h1> -->
        <h1 class="w3-right-align"><img src="<?php echo base_url() ?>assets/img/detail-logo-glowing5.png" style="width:100%;" class="w3-round"></h1>
        <div class="w3-bar w3-bottombar w3-border-pale-yellow w3-padding-16 w3-margin-bottom" id="proker">
        <a href="#proker"><button class="w3-bar-item w3-button w3-brown w3-hover-orange w3-border" style="width:33.3%"><i class=" fa fa-group w3-margin-right"></i>Organisasi</button></a>
        <a href="#profil"><button class="w3-bar-item w3-button w3-brown w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-user w3-margin-right"></i>Profil</button></a>
        <a href="#dokumen"><button class="w3-bar-item w3-button w3-brown w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-file-text-o w3-margin-right"></i>Dokumen</button></a>
        </div>
        <div class="w3-col m8">
            <h2 class="w3-left-align">Program Kerja</h2>
        </div>
        <?php if (time() < strtotime($timeLimit)){ echo"
        <div class=\"w3-col m4  w3-margin-top w3-right-align\">
            <button onclick=\"document.getElementById('Tambahorganisasi').style.display='block'\" class=\"w3-btn w3-orange w3-hover-amber w3-card-4\" title=\"Tambah organisasi\"><i class=\"fa fa-plus w3-margin-right\"></i>Tambah organisasi</button>
        </div>"; }?>
        <!-- <?php //$modalViewTambah->loadModal(); ?> -->
    </div>
  </header>

  <?php include('ModalView_programKerja.php'); ?>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
      <?php $i = 0; $sumProgres = 0; foreach ($this->session->userdata('proker') as $programKerja) {          
          $namaProker_cut = $programKerja->namaProker;
          if (strlen($programKerja->namaProker) > 15) {
              $namaProker_cut = substr($programKerja->namaProker, 0, 15)." ...";
          }
      echo 
      "<div class=\"w3-third w3-container w3-margin-bottom\">
          <div class=\"w3-deep-orange\" style=\"height: 7%;\">
              <div class=\"w3-col m7\"><h4 class=\"w3-left-align w3-margin-left\" title=\"$programKerja->namaProker\">".$namaProker_cut."</h4></div>
              <div class=\"w3-col m5 w3-right-align w3-padding\">
                  <button class=\"w3-btn w3-tiny w3-amber w3-hover-orange w3-card-4 btnLihatOrganisasi\" title=\"Lihat organisasi\" id=\"btnLihatOrganisasi\"><i class=\"fa fa-eye\"></i></button> ";
                  if (time() < strtotime($timeLimit)){
                  echo "<button class=\"w3-btn w3-tiny w3-amber w3-hover-orange w3-card-4\" title=\"Hapus organisasi\"><a href=\"".base_url("C_Proker/hapusProker/$programKerja->idProker")."\"><i class=\" fa fa-trash\"></i></a></button>";}
              echo "</div>
          </div>
          <div class=\"w3-container w3-deep-orange\">
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
              echo "<div class=\"w3-container w3-padding-small w3-yellow w3-center\" style=\"width:";
              if ($programKerja->statProposal == 2){
                if ($programKerja->statLpj == 2){
                  echo "100%"; $sumProgres += 100;
                } else if ($programKerja->statLpj == 1){
                  echo "75%"; $sumProgres += 75;
                } else {
                  echo "50%"; $sumProgres += 50;
                }
              } else if ($programKerja->statProposal == 1){
                echo "25%"; $sumProgres += 25;
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
            document.getElementsByClassName('btnLihatOrganisasi')[$i].onclick = function() {editProker(\""
              .$programKerja->namaProker."\",\""
              .$programKerja->pelaksana."\",\""
              .$programKerja->waktu."\",\""
              .$programKerja->jenisProker."\",\""
              .$programKerja->namaProposal."\",\""
              .$programKerja->namaLpj."\")};
          </script>
      </div>";
      $i++;
      } ?>
  </div>


  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>

  <!-- Line bridge -->
  <div class="w3-container" id="profil">
      <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <div class="w3-col m8">
              <h2 class="w3-left-align">Profil BEM</h2>
          </div>
          <div class="w3-col m4  w3-margin-top w3-right-align">
              <button class="w3-btn w3-orange w3-hover-amber w3-card-4" title="Ubah profil organisasi" id="btnUbahProfil"><i class="fa fa-pencil w3-margin-right"></i>Ubah profil</button>
          </div>
      </div>
  </div>  

  <!-- Images of Me -->
  <div class="w3-row-padding w3-padding-16">
    <!-- <div class="w3-col m6">
      <img src="<?php //echo base_url() ?>assets/img/detail-logo.png" alt="Me" style="width:100%">
    </div> -->
    <div class="w3-center">
      <img src="<?php echo base_url() ?>assets/img/logoBEM.png" alt="Me" style="width:15%">
    </div>
  </div>

  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <!-- <h4><b>Nama Organisasi</b></h4> -->
    <table class="w3-table w3-striped w3-amber">
      <?php 
      // $idOrganisasi = $this->session->userdata('akunAktif')->organisasi;
      // $organisasi = base_url("C_Organisasi/getOrganisasi/$idOrganisasi");
      // $organisasi = base_url("C_Organisasi/getOganisasi/".$this->session->userdata('akunAktif')->organisasi."");
      echo
        "<tr>
            <td style=\"width: 20%;\"><h5>Nama Organisasi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>BEM FILKOM<h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Kepanjangan</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Nama Ketua</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>Iqbal Caraka Altino</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Visi Misi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5>Mensejahterakan Filkom</h5></td>
        </tr>
        <tr>
            <td style=\"width: 20%;\"><h5>Struktur Organisasi</h5></td><td style=\"width: 2%;\"><h5>:</h5></td><td style=\"width: 78%;\"><h5><div class=\"w3-card-4\"><img src=\"".base_url()."assets/img/struktur.png\" alt=\"Struktur\" style=\"width:100%\"></div></h5></td>
        </tr>
        "
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
                    <a href = \"".base_url()."assets/doc/".$programKerja->namaProposal."\" target=_new>
                      <img src=\""; 
                      if (substr($programKerja->namaProposal,-3) == "pdf"){
                        echo base_url()."assets/img/pdf.png";
                      } else {
                        echo base_url()."assets/img/word.png";
                      }
                      echo "\" alt=\"Norway\" style=\"width:60%\"class=\"w3-hover-opacity\"></a>
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
                    <a href = \"".base_url()."assets/doc/".$programKerja->namaLpj."\" target=_new>
                      <img src=\""; 
                      if (substr($programKerja->namaLpj,-3) == "pdf"){
                        echo base_url()."assets/img/pdf.png";
                      } else {
                        echo base_url()."assets/img/word.png";
                      }
                      echo "\" alt=\"Norway\" style=\"width:60%\"class=\"w3-hover-opacity\">
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
      </div>
      <br>
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
// for (var i = document.getElementsByClassName('btnLihatOrganisasi').length - 1; i >= 0; i--) {  
//   document.getElementsByClassName('btnLihatOrganisasi')[i].onclick = function() {editProker("O001")};
// };
document.getElementById('btnUbahProfil').onclick = function() {editProfil(<?php 
  $namaOrganisasi = $this->session->userdata('organisasi')->namaOrganisasi;
  $kepanjangan = $this->session->userdata('organisasi')->kepanjangan;
  $namaKetua = $this->session->userdata('organisasi')->namaKetua;
  $visiMisi = $this->session->userdata('organisasi')->visiMisi;
   echo "\"$namaOrganisasi\",\"$kepanjangan\",\"$namaKetua\",\"$visiMisi\"";
  ?>)};
function editProker($namaProker, $pelaksana, $waktu, $jenisProker, $namaProposal, $namaLpj){
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
      // document.getElementById('fileProposal').value = "assets/doc/"+$namaProposal;
      document.getElementById('fileProposal').value = "D://TDC.docx";
      document.getElementById('fileLpj').value = $namaLpj;

}

function editProfil($namaOrganisasi, $kepanjangan, $namaKetua, $visiMisi){
  document.getElementById("ubahProfil").style.display = 'block'; 
  document.getElementById('namaOrganisasi').value = $namaOrganisasi;
  document.getElementById('kepanjangan').value = $kepanjangan;
  document.getElementById('namaKetua').value = $namaKetua;
  document.getElementById('visiMisi').value = $visiMisi;
  // document.getElementById('fileProposal').value = $visiMisi;
}
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySide").style.display = "block";
    document.getElementById("myOverlay2").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySide").style.display = "none";
    document.getElementById("myOverlay2").style.display = "none";
}

</script>

</body>
</html>
