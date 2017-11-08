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
    <title>รายงาน</title>
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

    <!-- Light Gallery Plugin Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/light-gallery/css/lightgallery.css'); ?>">

</head>

<body class="theme-red" style="padding:0px;margin:0px;">
  <section class="content" style="padding:0px;margin:0px;">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="card">
                        <div class="header">
                            <h2>
                              สลิป
                            </h2>
                        </div>
                        <div class="body">
                          <img src="<?php echo base_url('assets/image/confirm_payment/'.$viewSlip[0]['payment_slip']) ?>" style="width:100%" alt="">
                        </div>
                    </div>

              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>


      <!-- Jquery Core Js -->
      <script src="<?php echo base_url('assets/template/plugins/jquery/jquery.min.js'); ?>"></script>

      <!-- <script src="<?php echo base_url('assets/template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script> -->

      <!-- Bootstrap Core Js -->
      <script src="<?php echo base_url('assets/template/plugins/bootstrap/js/bootstrap.js'); ?>"></script>

      <!-- Select Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/bootstrap-select/js/bootstrap-select.js'); ?>"></script>

      <!-- Slimscroll Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>

      <!-- Waves Effect Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/node-waves/waves.js'); ?>"></script>

      <!-- Jquery DataTable Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/jszip.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/pdfmake.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/vfs_fonts.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/plugins/jquery-datatable/extensions/export/buttons.print.min.js'); ?>"></script>



      <!-- Custom Js -->
      <script src="<?php echo base_url('assets/template/js/admin.js'); ?>"></script>
      <!-- <script src="<?php echo base_url('assets/template/js/pages/forms/basic-form-elements.js'); ?>"></script> -->

      <script src="<?php echo base_url('assets/template/js/pages/tables/jquery-datatable.js'); ?>"></script>

      <script src="<?php echo base_url('assets/template/js/pages/forms/form-validation.js'); ?>"></script>
      <script src="<?php echo base_url('assets/template/js/pages/forms/advanced-form-elements.js'); ?>"></script>

      <!-- Demo Js -->
      <script src="<?php echo base_url('assets/template/js/demo.js'); ?>"></script>


      <!-- Jquery Validation Plugin Css -->
      <script src="<?php echo base_url('assets/template/plugins/jquery-validation/jquery.validate.js'); ?>"></script>

      <!-- JQuery Steps Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/jquery-steps/jquery.steps.js'); ?>"></script>

      <!-- Sweet Alert Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

      <!-- Dropzone Plugin Js -->
      <!-- <script src="<?php echo base_url('assets/template/plugins/dropzone/dropzone.js'); ?>"></script> -->

      <!-- Bootstrap Colorpicker Js -->
      <!-- <script src="<?php echo base_url('assets/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script> -->

      <!-- Input Mask Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/jquery-inputmask/jquery.inputmask.bundle.js'); ?>"></script>

      <!-- Multi Select Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/multi-select/js/jquery.multi-select.js'); ?>"></script>

      <!-- noUISlider Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/nouislider/nouislider.js'); ?>"></script>

      <!-- Jquery Spinner Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/jquery-spinner/js/jquery.spinner.js'); ?>"></script>

      <!-- Bootstrap Tags Input Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js'); ?>"></script>

      <!-- Light Gallery Plugin Js -->
      <script src="<?php echo base_url('assets/template/plugins/light-gallery/js/lightgallery-all.js'); ?>"></script>

      <!-- Custom Js -->
      <script src="<?php echo base_url('assets/template/js/pages/medias/image-gallery.js'); ?>"></script>

  </body>

  </html>
