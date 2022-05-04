<?php
  if(!$this->session->has_userdata('id_user')){
      redirect('/login/auth/index', 'refresh');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI-PPPD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/select2/dist/css/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?=base_url()?>assets/leaflet/leaflet.css">
  <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
</head>

<style type="text/css">
.box-tools{
    right: 0px !important;
    top: 0px !important;
}
.tambah{
  margin-bottom: 10px !important;
}  
</style>

<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

<header class="main-header">
  <!-- Logo -->
  <a href="<?=base_url()?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SI</b>-PPPD</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SI</b>-PPPD</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
            <span class="hidden-xs">Selamat Datang, <b><?=$this->session->userdata('nama')?></b></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header" style="height: 100px !important;">
              <!-- <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

              <p>
                <?=$this->session->userdata('nama')?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?=base_url()?>login/auth/doLogout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>