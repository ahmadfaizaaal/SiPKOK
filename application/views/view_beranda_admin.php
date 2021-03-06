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
    <a href="" class="w3-bar-item w3-button w3-hover-amber w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i><?php echo $this->session->userdata('akunAktif')->nama?></a> 
    <a href="" class="w3-bar-item w3-button w3-hover-amber w3-padding"><i class="fa fa-INFO-CIRCLE fa-fw w3-margin-right"></i><?php echo $this->session->userdata('akunAktif')->jabatan?></a>
    <a href="<?php echo base_url("C_Akun/logout") ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-amber w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
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
        <a href="#dokumen"><button class="w3-bar-item w3-button w3-brown w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-check-square-o w3-margin-right"></i>Verifikasi</button></a>
        <a href="#profil"><button class="w3-bar-item w3-button w3-brown w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-user w3-margin-right"></i>Profil BEM</button></a>
        </div>
        <div class="w3-col m8">
            <h2 class="w3-left-align">Organisasi</h2>
        </div>
        <div class="w3-col m4  w3-margin-top w3-right-align">
            <button onclick="document.getElementById('Tambahorganisasi').style.display='block'" class="w3-btn w3-amber w3-hover-orange w3-card-4" title="Tambah Organisasi"><i class="fa fa-plus w3-margin-right"></i>Tambah Organisasi</button>
        </div>
        <!-- <?php //$modalViewTambah->loadModal(); ?> -->
    </div>
  </header>

  <?php 
  include('ModalView_admin.php'); 
  ?>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
      <?php $i = 0; $sumProgres = 0; foreach ($this->session->userdata('organisasi') as $Organisasi) {
          $namaOrganisasi_cut = $Organisasi->namaOrganisasi;
          $namaKetua_cut = $Organisasi->namaKetua;
          $kepanjangan_cut = $Organisasi->kepanjangan;
          if (strlen($Organisasi->namaOrganisasi) > 15) {
              $namaOrganisasi_cut = substr($Organisasi->namaOrganisasi, 0, 15)." ...";
          }
          if (strlen($Organisasi->namaKetua) > 12) {
              $namaKetua_cut = substr($Organisasi->namaKetua, 0, 12)." ...";
          }
          if (strlen($Organisasi->kepanjangan) > 12) {
              $kepanjangan_cut = substr($Organisasi->kepanjangan, 0, 12)." ...";
          }
      echo 
      "<div class=\"w3-third w3-container w3-margin-bottom\">
          <div class=\"w3-deep-orange\" style=\"height: 7%;\">
              <div class=\"w3-col m7\"><h4 class=\"w3-left-align w3-margin-left\" title=\"$Organisasi->namaOrganisasi\">".$namaOrganisasi_cut."</h4></div>
              <div class=\"w3-col m5 w3-right-align w3-padding\">
                  <button class=\"w3-btn w3-tiny w3-amber w3-hover-orange w3-card-4\" title=\"Lihat organisasi\"><a href=\"".base_url("C_Organisasi/lihatDetailOrganisasi/$Organisasi->idOrganisasi")."\"><i class=\"fa fa-eye\"></i></a></button>
                  <button class=\"w3-btn w3-tiny w3-amber w3-hover-orange w3-card-4\" title=\"Hapus organisasi\"><a href=\"".base_url("C_Organisasi/hapusOrganisasi/$Organisasi->idOrganisasi")."\"><i class=\" fa fa-trash\"></i></a></button>
              </div>
          </div>
          <div class=\"w3-container w3-deep-orange\">
              <div class=\"w3-col m3 w3-margin-top\">
                  <img src=\"".base_url()."assets/img/".$Organisasi->logo."\" alt=\"Norway\" style=\"width:100%\"class=\"w3-hover-opacity\">
              </div>
              <div class=\"w3-col m9\">
                  <div class=\"w3-container w3-margin-top\">
                      <table class=\"w3-table w3-tiny w3-bordered w3-text-white\">
                          <tr>
                              <td><p>Kepanjangan</p></td><td><p title=\"$Organisasi->kepanjangan\">: ".$kepanjangan_cut."</p></td>
                          </tr>
                          <tr>
                              <td><p>Nama Ketua</p></td><td><p title=\"$Organisasi->namaKetua\">: ".$namaKetua_cut."</p></td>
                          </tr>
                          <tr>
                              <td><p>Kategori</p></td><td><p>: ";
                              if ($Organisasi->kategori == 0) {
                                echo "HMP";
                              } else if ($Organisasi->kategori == 1){
                                echo "LSO";
                              } else {
                                echo "Komunitas";
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
              echo "<div class=\"w3-container w3-padding-small w3-yellow w3-center\" style=\"width:";
            //   if ($Organisasi->statProposal == 2){
            //     if ($Organisasi->statLpj == 2){
            //       echo "100%"; $sumProgres += 100;
            //     } else if ($Organisasi->statLpj == 1){
                  echo "75%"; $sumProgres += 75;
            //     } else {
            //       echo "50%"; $sumProgres += 50;
            //     }
            //   } else if ($Organisasi->statProposal == 1){
            //     echo "25%"; $sumProgres += 25;
            //   } else {
            //     echo "0%";
            //   }
              echo ";\">";
            //   if ($Organisasi->statProposal == 2){
            //     if ($Organisasi->statLpj == 2){
            //       echo "100% ";
            //     } else if ($Organisasi->statLpj == 1){
                  echo "75%";
            //     } else {
            //       echo "50%";
            //     }
            //   } else if ($Organisasi->statProposal == 1){
            //     echo "25%";
            //   } 
              echo "</div>";
            // }
          echo "</div>          
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

<!-- VERIFIKASI -->
  <!-- Line bridge -->
  <div class="w3-container" id="dokumen">
      <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <div class="w3-col m8">
              <h2 class="w3-left-align">Verifikasi</h2>
          </div>
          <div class="w3-col m4 w3-right-align">
                <div class="w3-panel w3-white w3-round-xlarge w3-border w3-small">
                    <div class="w3-col m10">
                        <form class="w3-white">
                            <p><input class="w3-input" type="text" placeholder="Pencarian . . . . ."></p>
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
      <div class="w3-brown w3-margin-bottom w3-padding w3-round-large"><h4>Verifikasi Akun Yang Terdaftar</h4></div>
      <div align="right">
          <table class="w3-table-all w3-card w3-centered" style="width: 95%;">
            <tr class="w3-amber">
              <th>Nama</th>
              <th>Email</th>
              <th>Organisasi</th>
              <th>Jabatan</th>
              <th>Status</th>
            </tr>
            <?php foreach ($this->session->userdata('akunTerdaftar') as $akunTerdaftar) {
                      echo "<tr>
                                <td>".$akunTerdaftar->nama."</td>
                                <td>".$akunTerdaftar->email."</td>
                                <td>".$akunTerdaftar->namaOrganisasi."</td>
                                <td>".$akunTerdaftar->jabatan."</td>";
                                $idAkun = $akunTerdaftar->idAkun;
                      if ($akunTerdaftar->status == 0) {
                          echo "<td><a href=\"".base_url("C_Akun/verifikasiAkun/$idAkun")."\"><button class=\"w3-button w3-small w3-green w3-hover-green\" style=\"width: 80%;\" title=\"Verifikasi\">Verifikasi</button></a></td>
                          </tr>";
                      } else {
                          echo "<td><button class=\"w3-button w3-disabled w3-small w3-green w3-hover-green\" style=\"width: 80%;\" title=\"Verifikasi\">Verifikasi</button></td>
                          </tr>";
                      }
                  }
            ?>
          </table>
          <br><br>
      </div>
      
      <div class="w3-brown w3-margin-bottom w3-padding w3-round-large"><h4>Verifikasi Dokumen</h4></div>

      <h5>Dokumen Proposal</h5>
      <div align="right">
        <?php
          $j = 0; 
          foreach ($this->session->userdata('dokumen') as $Dokumen) {
            $idDokumen = $Dokumen->idDokumen;
            if ($Dokumen->jenis == 0) {              
              // if ($Dokumen->status != 0){          
            echo "<div class=\"w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card\" style=\"width: 95%;\">
                <div class=\"w3-col m10 w3-margin-top\">
                    <div class=\"w3-col m1 w3-center w3-margin-bottom\">
                      <a href = \"".base_url()."assets/doc/".$Dokumen->status."\" target=_new>
                        <img src=\""; 
                        if (substr($Dokumen->namaDokumen,-3) == "pdf"){
                          echo base_url()."assets/img/pdf.png";
                        } else {
                          echo base_url()."assets/img/word.png";
                        }
                        echo "\" alt=\"Norway\" style=\"width:60%\"class=\"w3-hover-opacity\" title=\"Klik untuk unduh\"></a>
                    </div>
                    <div class=\"w3-col m11 w3-left-align\"><h6>".$Dokumen->namaDokumen."</h6></div>
                </div>
                <div class=\"w3-col m2 w3-margin-top w3-right-align\">";
                    if ($Dokumen->status == 1) {
                      echo "<a href=".base_url("C_Dokumen/verifikasiDokumen/1/$idDokumen")."><button class=\"w3-button w3-small w3-green w3-hover-green\" style=\"width: 50%;\" title=\"Setujui\">Setujui</button></a>";
                    } else {
                      echo "<button class=\"w3-button w3-disabled w3-small w3-green w3-hover-green\" style=\"width: 50%;\" title=\"Setujui\">Setujui</button>";
                    }
                echo "</div>
            </div>";
            $j++;
        // }
        }
        }
        ?>         
      </div>

      <!-- Laporan Pertanggungjawaban -->
      <br><h5>Dokumen Laporan Pertanggungjawaban</h5>
      <div align="right">
        <?php 
          foreach ($this->session->userdata('dokumen') as $Dokumen) {
            if ($Dokumen->jenis == 1) {              
              if ($Dokumen->status != 0){          
            echo "<div class=\"w3-panel w3-leftbar w3-border-green w3-light-gray w3-margin-left w3-card\" style=\"width: 95%;\">
                <div class=\"w3-col m10 w3-margin-top\">
                    <div class=\"w3-col m1 w3-center w3-margin-bottom\">
                      <a href = \"".base_url()."assets/doc/".$Dokumen->status."\" target=_new>
                        <img src=\""; 
                        if (substr($Dokumen->namaDokumen,-3) == "pdf"){
                          echo base_url()."assets/img/pdf.png";
                        } else {
                          echo base_url()."assets/img/word.png";
                        }
                        echo "\" alt=\"Norway\" style=\"width:60%\" class=\"w3-hover-opacity\" title=\"Klik untuk unduh\"></a>
                    </div>
                    <div class=\"w3-col m11 w3-left-align\"><h6>".$Dokumen->namaDokumen."</h6></div>
                </div>
                <div class=\"w3-col m2 w3-margin-top w3-right-align\">";
                    $idDokumen = $Dokumen->idDokumen;
                    if ($Dokumen->status == 1) {
                      echo "<a href=".base_url("C_Dokumen/verifikasiDokumen/1/$idDokumen")."><button class=\"w3-button w3-small w3-green w3-hover-green\" style=\"width: 50%;\" title=\"Setujui\">Setujui</button></a>";
                    } else {
                      echo "<button class=\"w3-button w3-disabled w3-small w3-green w3-hover-green\" style=\"width: 50%;\" title=\"Setujui\">Setujui</button>";
                    }
                echo "</div>
            </div>";
        }
        }
        }
        ?>         
      </div>
      <br>
  </div>

  <!-- Line bridge -->
  <div class="w3-container" id="profil">
      <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <div class="w3-col m8">
              <h2 class="w3-left-align">Profil BEM</h2>
          </div>
          <div class="w3-col m4  w3-margin-top w3-right-align">
          </div>
      </div>
  </div>  

  <!-- Images of Me -->
  <div class="w3-row-padding w3-padding-16">
    <div class="w3-center">
      <img src="<?php echo base_url() ?>assets/img/logoBEM.png" alt="Me" style="width:15%">
    </div>
  </div>

  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <table class="w3-table w3-striped w3-amber">
      <?php 
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


      
  
  <div class="w3-red w3-center w3-padding-16">Dibuat oleh kelompok 1 RPL-I</div>

<!-- End page content -->
</div>

<script>
document.getElementById('Setuju')[0].onchange = function() {verifikasiProposal()};
function verifikasiProposal(){
  window.location.href = "google.com";
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
