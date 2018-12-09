<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Prediksi|PG</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        //var baseURL = "<?php echo base_url(); ?>";
        
    </script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P-</b>PG</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PREDIKSI</b>PG</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <!-- <i class="fa fa-history"></i> -->
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <!-- <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p> -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('loadChangePass'); ?>" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('siswa/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview <?php echo ($this->uri->segment(1) == 'ptn_controller'?'active':'') ?>">
              <a href="<?php echo site_url('ptn_controller'); ?>">
                <i class="fa fa-home"></i> <span>Data PTN</span></i>
              </a>
            </li>
            <?php if($this->session->userdata('id_privilage') == 1): ?>
            <li class="treeview">
              <a href="<?php echo site_url('DataSet/upload_file'); ?>">
                <i class="fa fa-list"></i>
                <span>Data Siswa</span>
            </a>
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('DataSet/upload_file'); ?>">
                <i class="fa fa-copy"></i>
                <span>Upload Data</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('ptn_controller/tambah_data'); ?>" >
                <i class="fa fa-plus-square"></i>
                <span>Tambah Data Baru</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#" >
                <i class="fa fa-check-square"></i>
                <span>Cek Prediksi</span>
              </a>
            </li>
            <?php endif ?>
            <?php if($this->session->userdata('id_privilage') != 1): ?>
            <li class="treeview">
              <a href="<?php echo site_url('prediksi_kelulusan')?>" >
                <i class="fa fa-copy"></i>
                <span>Prediksi Kelulusan</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('prediksi_kelulusan')?>" >
                <i class="fa fa-copy"></i>
                <span>Hasil SBMPTN</span>
              </a>
            </li>
            <?php endif ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
