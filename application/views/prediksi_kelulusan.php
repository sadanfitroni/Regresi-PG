<?php $this->load->view('includes/header') ?>

<div class="content-wrapper">
  <section class="content">
    <div class="panel panel-default">
      <div class="panel-heading">
        Form Prediksi Kelulusan
        </div>
        <div class="panel-body">
          <form class="" action="<?php echo site_url('prediksi_kelulusan/insert_prediksi') ?>" method="post">
            <div class="form-group row">
              <div class="col-xs-3">
                <label for="sel1">Pil. PTN 1</label>
                <select class="form-control" name="ptn1" id="ptn1">
                  <option value=""></option>
                  <?php foreach($ptn as $row): ?>
                    <option value="<?php echo $row->kode_ptn ?>"><?php echo $row->nama_ptn ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-xs-3">
                <label for="sel1">Program Studi</label>
                <select class="form-control" name="prodi1" id="prodi1">
                  <option value=""></option>
                  <?php foreach($prodi as $row): ?>
                    <option value="<?php echo $row->kode_prodi ?>" class="<?php echo $row->kode_ptn ?>"><?php echo $row->nama_prodi ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-3">
                <label for="sel1">Pil. PTN 2</label>
                <select class="form-control" name="ptn2" id="ptn2">
                  <option value=""></option>
                  <?php foreach($ptn as $row): ?>
                    <option value="<?php echo $row->kode_ptn ?>"><?php echo $row->nama_ptn ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-xs-3">
                <label for="sel1">Program Studi</label>
                <select class="form-control" name="prodi2" id="prodi2">
                  <option value=""></option>
                  <?php foreach($prodi as $row): ?>
                    <option value="<?php echo $row->kode_prodi ?>" class="<?php echo $row->kode_ptn ?>"><?php echo $row->nama_prodi ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-3">
                <label for="sel1">Pil. PTN 3</label>
                <select class="form-control" name="ptn3" id="ptn3">
                  <option value=""></option>
                  <?php foreach($ptn as $row): ?>
                    <option value="<?php echo $row->kode_ptn ?>"><?php echo $row->nama_ptn ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-xs-3">
                <label for="sel1">Program Studi</label>
                <select class="form-control" name="prodi3" id="prodi3">
                  <option value=""></option>
                  <?php foreach($prodi as $row): ?>
                    <option value="<?php echo $row->kode_prodi ?>" class="<?php echo $row->kode_ptn ?>"><?php echo $row->nama_prodi ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-3">
                <label for="pwd">Nilai TO 1</label>
                <input type="text" name="to1" class="form-control">
              </div>
              <div class="col-xs-3">
                <label for="pwd">Nilai TO 1</label>
                <input type="text" name="to2" class="form-control">
              </div>
            </div>
            <div>
              <input type="submit" name="submit" class="btn btn-primary" value="Next">
            </div>
          </form>
        </div>
    </div>
  </section>
</div>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.22.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery.chained.js') ?>"></script>
  <script type="text/javascript">
    $("#prodi1").chained("#ptn1");
    $("#prodi2").chained("#ptn2");
    $("#prodi3").chained("#ptn3");
  </script>
  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>

<?php $this->load->view('includes/footer') ?>
