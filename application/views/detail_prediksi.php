<?php $this->load->view('includes/header') ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h4>Ukuran Prediksi</h4>
          </div>
          <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Error :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static"><?php echo (!empty($hasil_prediksi)?$hasil_prediksi->error:'-') ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">MAD :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static"><?php echo (!empty($ukuran_prediksi)?$ukuran_prediksi->mad:'-') ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">MSE :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static"><?php echo (!empty($ukuran_prediksi)?$ukuran_prediksi->mse:'-') ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">MAPE :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static"><?php echo (!empty($ukuran_prediksi)?$ukuran_prediksi->mape:'-') ?></p>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h4>Statistik Regresi</h4>
          </div>
          <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">MultipleR :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static"><?php echo (!empty($statistik_prediksi)?$statistik_prediksi->r:'-') ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Rsquare :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static"><?php echo (!empty($statistik_prediksi)?$statistik_prediksi->rsquare:'-') ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">AdjustedRSquare :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static"><?php echo (!empty($statistik_prediksi)?$statistik_prediksi->adjustedrsquare:'-') ?></p>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Standar Error :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static"><?php echo (!empty($statistik_prediksi)?$statistik_prediksi->standar_error:'-') ?></p>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h4>Grafik</h4>
          </div>
          <div class="panel-body">
            <form class="form-horizontal">
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Error :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static">1.66489</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">MAD :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static">1.898</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">MSE :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static">72.0484</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">MAPE :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static">0.0000217064</p>
                  </div>
                </div> -->
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h4>Uji Asumsi Klasik</h4>
          </div>
          <div class="panel-body">
            <form class="form-horizontal">
                <!-- <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Normalitas :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">1</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Multikolinieritas :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">1</p>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Autokorelasi :</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">1</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Heteroskedastisitas : </label>
                  <div class="col-sm-8">
                    <p class="form-control-static">1</p>
                </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>
<?php $this->load->view('includes/footer') ?>
