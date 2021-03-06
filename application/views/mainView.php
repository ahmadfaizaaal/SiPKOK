<html>
	<head>
		<title><?php echo $judul; ?></title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/file.css">
	    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
	    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
	    <link href="<?php echo base_url() ?>assets/img/SIPKOK.png" rel="shortcut icon">
	</head>
	<body background="<?php echo base_url() ?>assets/img/back-3.png">
		<div>
			<div align="center" id="div-logo" style="width: 300px; height: 100px; margin-top: 390px; margin-left: 490px;">
				<a href="#" id="btn-logo" onclick="document.getElementById('modal-login').style.display='block'" style="width:auto;" title="Sistem Informasi Program Kerja Organisasi Kemahasiswaan">
					<img src="<?php echo base_url() ?>assets/img/logo-SIPKOK.png" alt="Logo SiPKOK" width="164px" height="82px">
				</a>
			</div>
		</div>


		<div id="modal-login" class="modal">
	        <form class="modal-content animate" action="<?php echo base_url('C_Akun/login') ?>" method="post">
		        <div class="imgcontainer">
		            <span onclick="document.getElementById('modal-login').style.display='none'" class="close" title="Tutup">&times;</span>
		            <img src="<?php echo base_url() ?>assets/img/detail-logo.png" alt="Logo SiPKOK" width="350px" height="110px">
		        </div>

	          	<div class="container">
		            <!-- <label><b>Email</b></label><br> -->
		            <img src="<?php echo base_url() ?>assets/img/email-grey.png" alt="" width="30px" height="30px">&nbsp&nbsp
		            <input type="text" style="width: 64%; padding: 12px 8px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box;" placeholder="Masukkan email" name="email_login" required>
		            <br>

		            <!-- <label><b>Password</b></label><br> -->
		            <img src="<?php echo base_url() ?>assets/img/pass-grey.png" alt="" width="30px" height="30px">&nbsp&nbsp
		            <input type="password" style="width: 64%; padding: 12px 8px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box;" placeholder="Masukkan kata sandi" name="password_login" required>
		            <br>
		              
		            <button type="submit" style="background-color: #4CAF50; color: white; padding: 12px 8px; margin: 8px 0; border: none; cursor: pointer; width: 68%;"><span class="glyphicon glyphicon-lock"></span> Masuk</button><br>
	          	</div>

	          	<div class="container" style="background-color:#f1f1f1; width: 100%;">
	            	<button type="button" style="color: white; width: auto; padding: 10px 8px; background-color: #f44336;" onclick="document.getElementById('modal-login').style.display='none'" class="cancelbtn">Batal</button>
	            	<span class="psw">Tidak punya akun? <a href="<?php echo base_url('C_Akun/register') ?>">Daftar!</a></span>
	          	</div>
	        </form>
	    </div>
	</body>
</html>