<!-- Modal tambah program kerja -->
  <div id="Tambahproker" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom w3-card-4">
          <div class="w3-card-4">
            <div class="w3-container w3-green">
                <h3><b>Tambah program kerja</b></h3>
                <span onclick="document.getElementById('Tambahproker').style.display='none'" class="w3-button w3-xlarge w3-display-topright w3-hover-green">&times;</span>
            </div>
            <form class="w3-container" action="upload.php" method="post" enctype="multipart/form-data" name="form1">
                <table class="w3-table w3-bordered-white">
                    <tr><td></td></tr>
                    <tr>
                        <td style="width: 33%;"><h5>Nama program kerja</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-input" type="text"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Nama ketua pelaksana</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-input" type="text"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Perkiraan waktu pelaksanaan</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-input" type="text"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Jenis program kerja</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5>
                            <select class="w3-small w3-card" id="dropdown-option" style="height: 20%;">
                              <option value="Berproposal">Berproposal</option>
                              <option value="Tanpa proposal">Tanpa proposal</option>
                            </select>
                        </h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Unggah proposal</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-small" type="file" name="resume" id="resume"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5>Unggah LPJ</h5></td><td style="width: 2%;"><h5>:</h5></td><td style="width: 65%;"><h5><input class="w3-small" type="file" name="resume" id="resume"></h5></td>
                    </tr>
                    <tr>
                        <td style="width: 33%;"><h5></h5></td><td style="width: 2%;"><h5></h5></td><td style="width: 65%;" class="w3-right-align w3-small"><button class="w3-btn w3-green w3-card">Tambahkan</button></td>
                    </tr>
                    <tr><td></td></tr>
                </table>
            </form>
          </div>  
      </div>
  </div>
