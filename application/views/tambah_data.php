<?php $this->load->view('includes/header') ?>

  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>

<div class="content-wrapper">
  <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
        Tambah Data PTN dan Prodi
        </div>
        <div class="panel-body">
          <form class="" action="<?php echo site_url('ptn_controller/insert') ?>" method="post">
            <div class="form-group row">
              <div class="col-xs-3">
                <label for="usr">Kode PTN:</label>
                <select class="form-control" name="kode_ptn">
                  <?php foreach ($ptn as $row): ?>
                    <option value="<?php echo $row->kode_ptn ?>"><?php echo $row->kode_ptn ?></option>
                  <?php endforeach; ?>
                </select>
                <!-- <input type="text" name="kode_ptn" class="form-control" id="usr"> -->
              </div>
              <div class="col-xs-3">
                <label for="pwd">Nama PTN:</label>
                <input type="text" name="nama_ptn" class="form-control" id="pwd">
              </div>
              <div class="col-xs-3">
                <label for="pwd">Wilayah:</label>
                <input type="text" name="wilayah" class="form-control" id="pwd">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-3">
                <label for="pwd">Kode Prodi:</label>
                <input type="text" name="kode_prodi" class="form-control" id="pwd">
              </div>
                <div class="col-xs-3">
                <label for="pwd">Prodi:</label>
                <input type="text" name="nama_prodi" class="form-control" id="pwd">
              </div>
              <div class="col-xs-3">
                <label for="pwd">Jenis Prodi:</label>
                <input type="text" name="jenis_prodi" class="form-control" id="pwd">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-2">
                <label for="pwd">Tahun ke-1</label>
                <input type="text" name="tahun1" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Tahun ke-2</label>
                <input type="text" name="tahun2" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Tahun ke-3</label>
                <input type="text" name="tahun3" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Tahun ke-4</label>
                <input type="text" name="tahun4" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Tahun ke-5</label>
                <input type="text" name="tahun5" class="form-control" id="pwd">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-2">
                <label for="pwd">Daya Tampung ke-1</label>
                <input type="text" name="daya_tampung1" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Daya Tampung ke-2</label>
                <input type="text" name="daya_tampung2" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Daya Tampung ke-3</label>
                <input type="text" name="daya_tampung3" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Daya Tampung ke-4</label>
                <input type="text" name="daya_tampung4" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Daya Tampung ke-5</label>
                <input type="text" name="daya_tampung5" class="form-control" id="pwd">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-2">
                <label for="pwd">Jumlah Peminat ke-1</label>
                <input type="text" name="jumlah_peminat1" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Jumlah Peminat ke-2</label>
                <input type="text" name="jumlah_peminat2" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Jumlah Peminat ke-3</label>
                <input type="text" name="jumlah_peminat3" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Jumlah Peminat ke-4</label>
                <input type="text" name="jumlah_peminat4" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Jumlah Peminat ke-5</label>
                <input type="text" name="jumlah_peminat5" class="form-control" id="pwd">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-2">
                <label for="pwd">Passing Grade-1</label>
                <input type="text" name="pg1" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Passing Grade-2</label>
                <input type="text" name="pg2" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Passing Grade-3</label>
                <input type="text" name="pg3" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Passing Grade-4</label>
                <input type="text" name="pg4" class="form-control" id="pwd">
              </div>
              <div class="col-xs-2">
                <label for="pwd">Passing Grade-5</label>
                <input type="text" name="pg5" class="form-control" id="pwd">
              </div>
            </div>
            <div>
              <input type="submit" name="submit" value="Tambah" class="btn btn-primary btn-md ">
            </div>
          </form>
        </div>
    </div>
  </section>
</div>

<?php $this->load->view('includes/footer') ?>
