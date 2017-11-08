<?php if(empty($_SESSION['ADMIN_ID'])){
  redirect('Admin');
} ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/template/iamges/favicon.ico'); ?>">

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap/css/bootstrap.css'); ?>"/>

    <!-- Waves Effect Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/node-waves/waves.css'); ?>"/>

    <!-- Animation Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/animate-css/animate.css'); ?>"/>

    <!-- Bootstrap Material Datetime Picker Css -->
    <!-- <link href="<?php echo base_url('assets/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" /> -->


    <!-- Wait Me Css -->
    <!-- <link href="<?php echo base_url('assets/template/plugins/waitme/waitMe.css'); ?>" rel="stylesheet" /> -->

    <!-- Sweet Alert Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/sweetalert/sweetalert.css'); ?>"/>

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'); ?>"/>

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css/style.css'); ?>"/>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css/themes/all-themes.css'); ?>"/>

    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" />

    <!-- Dropzone Css -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/dropzone/dropzone.css'); ?>" > -->

    <!-- Colorpicker Css -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" /> -->

    <!-- Light Gallery Plugin Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/light-gallery/css/lightgallery.css'); ?>">

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo site_url('Admin'); ?>">ADMIN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url('Admin/logout'); ?>"><i class="material-icons">input</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
  <?php $this->load->view('template/back/navigator') ?>
