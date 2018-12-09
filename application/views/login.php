<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Prediksi-PG</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Login</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Registrasi</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="login-box-body">
              <p class="login-box-msg">Login</p>
              <?php $this->load->helper('form'); ?>
              <div class="row">
                  <div class="col-md-12">
                      <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                  </div>
              </div>
              <?php
              $this->load->helper('form');
              $error = $this->session->flashdata('error');
              $success = $this->session->flashdata('success');
              if($error)
              {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $error; ?>
                  </div>
              <?php
              }

              if($success)
              {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $success; ?>
                  </div>
              <?php } ?>

              <form action="<?php echo site_url('siswa/loginMe'); ?>" method="post">
                <div class="form-group has-feedback">
                  <input type="email" class="form-control" placeholder="Email" name="email" required />
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" name="password" required />
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <!-- <div class="checkbox icheck">
                      <label>
                        <input type="checkbox"> Remember Me
                      </label>
                    </div>  -->
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login" />
                  </div><!-- /.col -->
                </div>
              </form>

            </div><!-- /.login-box-body -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
            <div class="login-box-body">
              <p class="login-box-msg">Registrasi</p>
              <?php $this->load->helper('form'); ?>
              <div class="row">
                  <div class="col-md-12">
                      <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                  </div>
              </div>

              <form action="<?php echo site_url('siswa/register'); ?>" method="post">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="NIS" name="nis" required />
                </div>
                <div class="form-group has-feedback">
                  <input type="email" class="form-control" placeholder="Email" name="email" required />
                </div>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required />
                  </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" name="password" required />
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <!-- <div class="checkbox icheck">
                      <label>
                        <input type="checkbox"> Remember Me
                      </label>
                    </div>  -->
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Registrasi" />
                  </div><!-- /.col -->
                </div>
              </form>

            </div><!-- /.login-box-body -->
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
    </div><!-- /.login-box -->

    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
