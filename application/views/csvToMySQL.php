
  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>

<div class="content-wrapper">
  <section class="content">
    <?php if(!empty($status)){
        echo '<div class="alert alert-danger">'.$status.'</div>';
    }?>
    <div class="panel panel-default">
      <div class="panel-heading">
            Data Prodi
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Data</a>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url("dataSet/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        </div>
    </div>
  </section>
</div>
