  <div id="Tambahorganisasi" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom w3-card-4">
          <div class="w3-card-4">
            <div class="w3-container w3-green">
                <h3><b>Tambah Organisasi</b></h3>
                <span onclick="document.getElementById('Tambahorganisasi').style.display='none'" class="w3-button w3-xlarge w3-display-topright w3-hover-green">&times;</span>
            </div>
            <form class="w3-container" action=<?php echo base_url("C_Organisasi/tambahOrganisasi") ?> method="post" enctype="multipart/form-data" name="form1">
                <table class="w3-table w3-bordered-white">
                    <tr><td></td></tr>
                    <tr>
                        <td style="width: 33%;"><h5>Nama Organisasi</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-input" type="text" name="namaOrganisasi" id="namaOrganisasi"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Kepanjangan</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-input" type="text" name="kepanjangan" id="kepanjangan"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Nama Ketua</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-input" type="text" name="namaKetua" id="namaKetua"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Kategori</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5>
                            <select class="w3-card" id="dropdown-option" style="height: 20%;" name="kategori" id="kategori">
                              <option value="HMP" id="optHMP">HMP</option>
                              <option value="LSO" id="optLSO">LSO</option>
                              <option value="Komunitas" id="optKomunitas">Komunitas</option>
                            </select>
                        </h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5></h5></td><td style="width: 2%;"><h5></h5></td><td style="width: 65%;" class="w3-right-align w3-small"><button class="w3-btn w3-green w3-card">Tambah Organisasi</button></td>
                    </tr>
                    <tr><td></td></tr>
                </table>
            </form>
          </div>  
      </div>
  </div>
