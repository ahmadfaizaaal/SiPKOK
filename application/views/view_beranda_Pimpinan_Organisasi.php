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

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-amber w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-center">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-tiny w3-padding w3-hover-orange" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo base_url() ?>assets/img/logo-hmif2.png" style="width:80%;" class="w3-round"><br><br>
    <h4><b>HMIF</b></h4>
    <p class="w3-text-white"><b><i>Himpunan Mahasiswa Informatika</i></b></p>
  </div>
  <div class="w3-bar-block">
    <!-- <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button  w3-hover-light-blue w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a> --> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-orange w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i><?php echo $akunAktif->nama?></a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-orange w3-padding w3-hover-blue"><i class="fa fa-INFO-CIRCLE fa-fw w3-margin-right"></i><?php echo $akunAktif->jabatan?></a>
    <a href="<?php echo base_url('C_Akun/index') ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-orange w3-padding w3-hover-blue"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
  <!-- <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div> -->
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
        <div class="w3-bar w3-bottombar w3-border-white w3-padding-16 w3-margin-bottom">
            <button class="w3-bar-item w3-button w3-amber w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-user w3-margin-right"></i>Profil Organisasi</button>
            <button class="w3-bar-item w3-button w3-amber w3-hover-orange w3-border" style="width:33.3%"><i class=" fa fa-tasks w3-margin-right"></i>Program Kerja</button>
            <button class="w3-bar-item w3-button w3-amber w3-hover-orange w3-border" style="width:33.3%"><i class="fa fa-file-text-o w3-margin-right"></i>Dokumen</button>
        </div>
        <div class="w3-col m8">
            <h2 class="w3-left-align">Program Kerja</h2>
        </div>
        <div class="w3-col m4  w3-margin-top w3-right-align">
            <button class="w3-btn w3-amber w3-hover-orange w3-card-4" title="Ubah profil organisasi"><i class="fa fa-pencil w3-margin-right"></i>Tambah program kerja</button>
        </div>
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
      <?php foreach ($proker as $programKerja) {
        # code...
      echo 
      "<div class=\"w3-third w3-container w3-margin-bottom\">
          <div class=\"w3-blue\" style=\"height: 7%;\">
              <div class=\"w3-col m6\"><h4 class=\"w3-left-align w3-margin-left\">".$programKerja->namaProker."</h4></div>
              <div class=\"w3-col m6 w3-right-align w3-padding\">
                  <button class=\"w3-btn w3-tiny w3-red w3-hover-white w3-card-4\"><i class=\"fa fa-pencil\"></i></button>
                  <button class=\"w3-btn w3-tiny w3-red w3-hover-white w3-card-4\"><a href=\"".base_url("C_Proker/hapusProker/$programKerja->idProker")."\"><i class=\" fa fa-trash\"></i></a></button> 
              </div>
          </div>
          <div class=\"w3-container w3-blue\">
              <div class=\"w3-col m3 w3-margin-top\">
                  <img src=\"".base_url()."assets/img/BP.png\" alt=\"Norway\" style=\"width:100%\"class=\"w3-hover-opacity\">
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
                              <td><p>Jenis</p></td><td><p>: ".$programKerja->jenis."</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class=\"w3-white\">
              <div class=\"w3-container w3-green w3-padding w3-center\" style=\"width:25%;\">25%</div>
          </div>
      </div>";
      } ?>
      <!--- <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-blue" style="height: 7%;">
              <div class="w3-col m6"><h4 class="w3-left-align w3-margin-left">IF ELSE</h4></div>
              <div class="w3-col m6 w3-right-align w3-padding">
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Ubah program kerja"><i class="fa fa-pencil"></i></button>
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Hapus program kerja"><i class=" fa fa-trash"></i></button> 
              </div>
          </div>
          <div class="w3-container w3-blue">
              <div class="w3-col m3 w3-margin-top">
                  <img src="<?php echo base_url() ?>assets/img/BP.png" alt="Norway" style="width:100%"class="w3-hover-opacity">
              </div>
              <div class="w3-col m9">
                  <div class="w3-container w3-margin-top">
                      <table class="w3-table w3-tiny w3-bordered w3-text-white">
                          <tr>
                              <td><p>Ketua</p></td><td><p>: Riza Anisul Fu'ad</p></td>
                          </tr>
                          <tr>
                              <td><p>Waktu</p></td><td><p>: Oktober 2017</p></td>
                          </tr>
                          <tr>
                              <td><p>Jenis</p></td><td><p>: Berproposal</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class="w3-white">
              <div class="w3-container w3-green w3-padding w3-center" style="width:75%;">75%</div>
          </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-blue" style="height: 7%;">
              <div class="w3-col m6"><h4 class="w3-left-align w3-margin-left">IF ELSE</h4></div>
              <div class="w3-col m6 w3-right-align w3-padding">
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Ubah program kerja"><i class="fa fa-pencil"></i></button>
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Hapus program kerja"><i class=" fa fa-trash"></i></button> 
              </div>
          </div>
          <div class="w3-container w3-blue">
              <div class="w3-col m3 w3-margin-top">
                  <img src="<?php echo base_url() ?>assets/img/BP.png" alt="Norway" style="width:100%"class="w3-hover-opacity">
              </div>
              <div class="w3-col m9">
                  <div class="w3-container w3-margin-top">
                      <table class="w3-table w3-tiny w3-bordered w3-text-white">
                          <tr>
                              <td><p>Ketua</p></td><td><p>: Riza Anisul Fu'ad</p></td>
                          </tr>
                          <tr>
                              <td><p>Waktu</p></td><td><p>: Oktober 2017</p></td>
                          </tr>
                          <tr>
                              <td><p>Jenis</p></td><td><p>: Berproposal</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class="w3-white">
              <div class="w3-container w3-green w3-padding w3-center" style="width:100%;">100%</div>
          </div>
      </div>
  </div>
  
  <!-- Second Photo Grid-->
  <!--- <div class="w3-row-padding">
      <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-blue" style="height: 7%;">
              <div class="w3-col m6"><h4 class="w3-left-align w3-margin-left">ELSE IF</h4></div>
              <div class="w3-col m6 w3-right-align w3-padding">
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Ubah program kerja"><i class="fa fa-pencil"></i></button>
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Hapus program kerja"><i class=" fa fa-trash"></i></button> 
              </div>
          </div>
          <div class="w3-container w3-blue">
              <div class="w3-col m3 w3-margin-top">
                  <img src="<?php echo base_url() ?>assets/img/NP.png" alt="Norway" style="width:100%"class="w3-hover-opacity">
              </div>
              <div class="w3-col m9">
                  <div class="w3-container w3-margin-top">
                      <table class="w3-table w3-tiny w3-bordered w3-text-white">
                          <tr>
                              <td><p>Ketua</p></td><td><p>: Riza Anisul Fu'ad</p></td>
                          </tr>
                          <tr>
                              <td><p>Waktu</p></td><td><p>: Oktober 2017</p></td>
                          </tr>
                          <tr>
                              <td><p>Jenis</p></td><td><p>: Non Proposal</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class="w3-white">
              <div class="w3-container w3-green w3-padding w3-center" style="width:75%;">75%</div>
          </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-blue" style="height: 7%;">
              <div class="w3-col m6"><h4 class="w3-left-align w3-margin-left">IF ELSE</h4></div>
              <div class="w3-col m6 w3-right-align w3-padding">
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Ubah program kerja"><i class="fa fa-pencil"></i></button>
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Hapus program kerja"><i class=" fa fa-trash"></i></button> 
              </div>
          </div>
          <div class="w3-container w3-blue">
              <div class="w3-col m3 w3-margin-top">
                  <img src="<?php echo base_url() ?>assets/img/NP.png" alt="Norway" style="width:100%"class="w3-hover-opacity">
              </div>
              <div class="w3-col m9">
                  <div class="w3-container w3-margin-top">
                      <table class="w3-table w3-tiny w3-bordered w3-text-white">
                          <tr>
                              <td><p>Ketua</p></td><td><p>: Riza Anisul Fu'ad</p></td>
                          </tr>
                          <tr>
                              <td><p>Waktu</p></td><td><p>: Oktober 2017</p></td>
                          </tr>
                          <tr>
                              <td><p>Jenis</p></td><td><p>: Non Proposal</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class="w3-white">
              <div class="w3-container w3-green w3-padding w3-center" style="width:50%;">50%</div>
          </div>
      </div>
      <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-blue" style="height: 7%;">
              <div class="w3-col m6"><h4 class="w3-left-align w3-margin-left">IF ELSE</h4></div>
              <div class="w3-col m6 w3-right-align w3-padding">
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Ubah program kerja"><i class="fa fa-pencil"></i></button>
                  <button class="w3-btn w3-tiny w3-red w3-hover-white w3-card-4" title="Hapus program kerja"><i class=" fa fa-trash"></i></button> 
              </div>
          </div>
          <div class="w3-container w3-blue">
              <div class="w3-col m3 w3-margin-top">
                  <img src="<?php echo base_url() ?>assets/img/BP.png" alt="Norway" style="width:100%"class="w3-hover-opacity">
              </div>
              <div class="w3-col m9">
                  <div class="w3-container w3-margin-top">
                      <table class="w3-table w3-tiny w3-bordered w3-text-white">
                          <tr>
                              <td><p>Ketua</p></td><td><p>: Riza Anisul Fu'ad</p></td>
                          </tr>
                          <tr>
                              <td><p>Waktu</p></td><td><p>: Oktober 2017</p></td>
                          </tr>
                          <tr>
                              <td><p>Jenis</p></td><td><p>: Berproposal</p></td>
                          </tr>
                      </table>
                      <p></p>
                  </div>
              </div>
          </div>
          <div class="w3-white">
              <div class="w3-container w3-green w3-padding w3-center" style="width:25%;">25%</div>
          </div>
      </div> -->
  </div>

  <!-- Second Photo Grid-->
  <!-- <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="<?php //echo base_url() ?>assets/img/gambar1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="<?php //echo base_url() ?>assets/img/gambar1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="<?php //echo base_url() ?>assets/img/gambar1.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div> -->

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>

  <!-- Line bridge -->
  <div class="w3-container" id="about">
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
        <tr>
            <td style="width: 20%;"><h5>Nama Organisasi</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 78%;"><h5>HMIF</h5></td>
        </tr>
        <tr>
            <td style="width: 20%;"><h5>Kepanjangan</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 78%;"><h5>Himpunan Mahasiswa Informatika</h5></td>
        </tr>
        <tr>
            <td style="width: 20%;"><h5>Nama Ketua</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 78%;"><h5>Ahmad Faizal</h5></td>
        </tr>
        <tr>
            <td style="width: 20%;"><h5>Visi Misi</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 78%;"><h5>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</h5></td>
        </tr>
        <tr>
            <td style="width: 20%;"><h5>Struktur Organisasi</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 78%;"><h5><div class="w3-card-4"><img src="<?php echo base_url() ?>assets/img/struktur.png" alt="Struktur" style="width:100%"></div></h5></td>
        </tr>
        <tr>
            <td style="width: 20%;"><h5>Progress Organisasi</h5></td><td style="width: 2%;"><h5>:</h5></td>
            <td style="width: 78%;">
                <div class="w3-white w3-margin-top">
                    <div class="w3-container w3-green w3-padding w3-center" style="width:75%">75%</div>
                </div>
            </td>
        </tr>
    </table>
    
    <!-- <h4>Technical Skills</h4> -->
    <!-- Progress bars / Skills -->
    <!-- <p>Photography</p>
    <div class="w3-white">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">95%</div>
    </div>
    <p>Web Design</p>
    <div class="w3-white">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
    </div>
    <p>Photoshop</p>
    <div class="w3-white">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
    </div>
    <p>
      <button class="w3-button w3-dark-blue w3-padding-large w3-margin-top w3-margin-bottom">
        <i class="fa fa-download w3-margin-right"></i>Download Resume
      </button>
    </p>
    <hr> -->
    
    <!-- <h4>How much I charge</h4> -->
    <!-- Pricing Tables -->
    <!-- <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
          <li class="w3-padding-16">Web Design</li>
          <li class="w3-padding-16">Photography</li>
          <li class="w3-padding-16">1GB Storage</li>
          <li class="w3-padding-16">Mail Support</li>
          <li class="w3-padding-16">
            <h2>$ 10</h2>
            <span class="w3-opacity">per month</span>
          </li>
          <li class="w3-light-blue w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
          </li>
        </ul>
      </div>
      
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-teal w3-xlarge w3-padding-32">Pro</li>
          <li class="w3-padding-16">Web Design</li>
          <li class="w3-padding-16">Photography</li>
          <li class="w3-padding-16">50GB Storage</li>
          <li class="w3-padding-16">Endless Support</li>
          <li class="w3-padding-16">
            <h2>$ 25</h2>
            <span class="w3-opacity">per month</span>
          </li>
          <li class="w3-light-blue w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
          </li>
        </ul>
      </div>
      
      <div class="w3-third">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
          <li class="w3-padding-16">Web Design</li>
          <li class="w3-padding-16">Photography</li>
          <li class="w3-padding-16">Unlimited Storage</li>
          <li class="w3-padding-16">Endless Support</li>
          <li class="w3-padding-16">
            <h2>$ 25</h2>
            <span class="w3-opacity">per month</span>
          </li>
          <li class="w3-light-blue w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
          </li>
        </ul>
      </div>
    </div>
  </div> -->
  
  <!-- Contact Section -->
  <!-- <div class="w3-container w3-padding-large w3-blue">
    <h4 id="contact"><b>Contact Me</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-blue">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-blue"></i></p>
        <p>email@email.com</p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-blue"></i></p>
        <p>Chicago, US</p>
      </div>
      <div class="w3-third w3-dark-blue">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-blue"></i></p>
        <p>512312311</p>
      </div>
    </div>
    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
    </form> -->
  </div>

  <!-- Line bridge -->
  <div class="w3-container" id="about">
      <div class="w3-bar w3-topbar w3-border-white w3-padding-16">
          <h2 class="w3-left-align">Dokumen</h2>
      </div>
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
  
  <div class="w3-black w3-center w3-padding-24">Dibuat oleh kelompok 1 RPL-I</div>

<!-- End page content -->
</div>

<script>
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
