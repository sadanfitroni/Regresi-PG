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
        Form Input Data Test
        <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Data</a>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url("import_csv/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary btn-md" name="importSubmit" value="Import">
            </form>            
          <div class="form-group row">
            <div class="col-xs-3">
              <label for="sel1">Tahun</label>
              <select class="form-control" id="sel1">
                <option>2017</option>
              </select>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-xs-3">
              <label for="sel1">PTN</label>
              <select class="form-control" id="sel1">
                <option>UNAIR</option>
              </select>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-xs-3">
              <label for="sel1">Prodi</label>
              <select class="form-control" id="sel1">
                <option>Pendidikan Dokter</option>
              </select>
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-xs-3">
              <label for="pwd">Daya Tampung</label>
              <input type="password" class="form-control" id="pwd">
            </div>     
          </div>
           <div class="form-group row">
            <div class="col-xs-3">
              <label for="pwd">Jumlah Peminat</label>
              <input type="password" class="form-control" id="pwd">
            </div>     
          </div>
          <div>
            <button type="button" class="btn btn-primary btn-md">Test</button>
          </div>
        </div>
    </div>
  </section>
</div>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.22.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php $this->load->view('includes/footer') ?>