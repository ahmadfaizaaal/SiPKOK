<html>
    <head>
        <title><?php echo $judul; ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/file.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
        <link href="<?php echo base_url() ?>assets/img/SIPKOK.png" rel="shortcut icon">
        <style>
            .form {
              width: 96%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; border-radius: 5px; text-align: center; text-indent: center;
            }
            .formNama {
              width: 48%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; border-radius: 5px; text-align: center; text-indent: center;
            }
        </style>
    </head>
    <body background="<?php echo base_url() ?>assets/img/back-regis.png">
        <div class="container-fluid">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="background-color: rgba(255,255,255,0.7); border-radius: 15px; margin-top: 75px;">
                <div class="text-center" style="margin-top: 15px;">
                    <img src="<?php echo base_url() ?>assets/img/detail-logo.png" alt="Logo SiPKOK" width="350px" height="100px">
                    <hr style="border-color: #616161;">
                    <form action="#" method="post">
                        <!-- <input type="text" class="formNama" placeholder="Nama Depan" name="namadepan" required> -->
                        <select id="cb-jenis-organisasi" class="formNama">
                            <option value="" disabled selected>Jenis Organisasi</option>
                            <?php foreach ($organisasi as $org) {
                                echo "<option value=\"\">".$org->namaOrganisasi."</option>";
                            }
                            ?>
                        </select>
                        <!-- <input type="text" class="formNama" placeholder="Nama Belakang" name="namabelakang" required> -->
                        <select id="cb-jabatan" class="formNama">
                            <option value="" disabled selected>Jabatan</option>
                            <option value="">Ketua Organisasi</option>
                            <option value="">Sekretaris Organisasi</option>                            
                        </select>
                        <br>
                        <input type="text" class="form" placeholder="Nama Lengkap" name="username" required>
                        <br>
                        <input type="text" class="form" placeholder="Alamat Email" name="email" required>
                        <br>
                        <input type="password" class="form" placeholder="Type Password" name="password" required>
                        <br>
                        <input type="password" class="form" placeholder="Re-type Password" name="repassword" required>
                        <br>
                        <input type="submit" value="Batal" style="background-color: #F44336; color: white; padding: 14px 10px; margin: 8px 0;border: none;cursor: pointer;width: 48%;" class="batal">
                        <input type="submit" value="Kirim" style="background-color: #4CAF50; color: white; padding: 14px 10px; margin: 8px 0;border: none;cursor: pointer;width: 48%;" class="kirim" name="kirim">
                    </form>
                </div>
                <div class="notifcontainer" style="display:none">
                    <h2>Pendaftaran Berhasil</h2>
                    <p>Periksa email anda untuk pemberitahuan lebih lanjut!</p>
                    <a href="<?php echo base_url()?>login">Click disini untuk login</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </body>
</html>