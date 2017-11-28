<html>
  <head>
      <title><?php echo $judul; ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/navbar.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/file.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
      <script src="<?php echo base_url() ?>assets/js/script.js"></script>
      <link href="<?php echo base_url() ?>assets/img/SIPKOK.png" rel="shortcut icon">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="margin-top: -10px;"><img src="<?php echo base_url() ?>assets/img/detail-logo.png" alt="Logo SiPKOK" width="150px" height="40px"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-tasks"></span> Proker</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-file"></span> Dokumen</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="background-color: rgb(255, 217, 102); height: 640px;"></div>
            <div class="col-md-9" style="background-color: rgb(84, 197, 247); height: 640px;"></div>
        </div>
    </div>
  </body>
</html>