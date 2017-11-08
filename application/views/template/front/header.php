<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ระบบขายสินค้าออนไลน์ร้านขายเครื่องสำอาง กรณีศึกษาร้านโสมมะนาว</title>
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

    <!-- Dropzone Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/dropzone/dropzone.css'); ?>" >

    <!-- Colorpicker Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" />

    <!-- Light Gallery Plugin Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/light-gallery/css/lightgallery.css'); ?>">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>">

    <!-- Wait Me Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/waitme/waitMe.css'); ?>">

</head>

<body class="theme-red">
  <!-- <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 offset-2"> -->
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
    <section class="contentfront">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <img width="100%" src="<?php echo base_url('assets/template/images/logo.jpg'); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar">
                <div class="container-fluid bg-light-green">

                    <div class="navbar-header">
                      <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                      <!-- <a href="javascript:void(0);" class="bars"></a> -->
                      <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url(); ?>"><i class="material-icons">home</i> หน้าแรก</a>
                      <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url('Home/guide/'); ?>"><i class="material-icons">help</i> วิธีการสั่งซื้อ</a>

                      <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url('Home/confirmPayment/'); ?>"><i class="material-icons">monetization_on</i> แจ้งการชำระเงิน</a>
                      <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url('Home/statusDelivery/'); ?>"><i class="material-icons">directions_car</i> รายการจัดส่ง</a>
                      <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url('Home/contact/'); ?>"><i class="material-icons">info</i> ติดต่อร้านค้า</a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="navbar-nav navbar-right" style="list-style-type: none;">
                          <li class="dropdown">
                              <!-- <a left class="btn btn-lg bg-light-green waves-effect" data-toggle="modal" data-target="#cartModal"> -->
                              <?php if(!empty($_SESSION['MEMBER_ID'])){ ?>
                                <font><?php echo $_SESSION['MEMBER_FULLNAME']; ?></font>

                              <?php } ?>
                              <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url('Home/cart'); ?>">

                                  <i class="material-icons">add_shopping_cart</i> ตะกร้า
                                <span class="label-count">
                                  <?php
                                  if(isset($_SESSION["strProductID"])){
                                    echo count($_SESSION["strProductID"]);
                                  }
                                   ?>
                                </span>
                              </a>
                          </li>
                            <!-- #END# Notifications -->
                            <?php if(empty($_SESSION['MEMBER_ID'])){ ?>

                              <li class="dropdown">
                                  <a left class="btn btn-lg bg-light-green waves-effect" data-toggle="modal" data-target="#loginModal"><i class="material-icons">account_circle</i> เข้าสู่ระบบ</a>
                              </li>
                              <li class="dropdown">
                                  <a left class="btn btn-lg bg-light-green waves-effect" href="<?php echo site_url('member/registerForm'); ?>"><i class="material-icons">person_add</i> สมัครสมาชิก</a>
                              </li>
                            <?php }else{ ?>
                              <li class="dropdown">

                                  <a left class="dropdown-toggle btn btn-lg bg-light-green waves-effect" data-toggle="dropdown" role="button">
                                    <i class="material-icons">settings</i>
                                </a>
                                  <ul class="dropdown-menu">
                                      <li class="header"></li>
                                      <li>
                                          <ul class="menu tasks">
                                              <li>
                                                  <a href="<?php echo site_url('Member/profile/'); ?>">
                                                      <h4>
                                                          ข้อมูลส่วนตัว
                                                      </h4>
                                                  </a>
                                              </li>
                                              <!-- <li>
                                                  <a href="<?php echo site_url('Member/memberAddress/'); ?>">
                                                      <h4>
                                                          ที่อยู่ในการจัดส่ง
                                                      </h4>
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="<?php echo site_url('Member/order/'); ?>">
                                                      <h4>
                                                          รายการสั่งซื้อ
                                                      </h4>
                                                  </a>
                                              </li> -->

                                          </ul>
                                      </li>
                                      <li class="footer">
                                          <a left class="waves-effect" href="<?php echo site_url('Member/logout'); ?>"><p class="btn-danger">ออกจากระบบ</p></a>
                                      </li>
                                  </ul>
                              </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- #END# Exportable Table -->



          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="smallModalLabel">เข้าสู่ระบบ</h4>
                      </div>
                      <?php echo form_open('/member/login'); ?>
                      <div class="modal-body">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="member_username" class="form-control" placeholder="Username">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" name="member_password" class="form-control" placeholder="Password">
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn waves-effectc btn-success">เข้าสู่ระบบ</button>
                      </div>
                      <?php echo form_close(); ?>
                  </div>
              </div>
          </div>
                      <div class="row clearfix">

                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="card">
                                    <div class="header">
                                        <h2>หมวดหมู่</h2>
                                    </div>
                                    <a href="<?php echo site_url(''); ?>" title="สินค้าทั้งหมด" class="list-group-item waves-effectc">สินค้าทั้งหมด
                                      <?php if (count($AllProduct)>0): ?>
                                        <span class="badge bg-light-green">
                                          <?php echo count($AllProduct); ?>
                                        </span>
                                      <?php else: ?>
                                        <span class="badge bg-red">
                                          <?php echo count($AllProduct); ?>
                                        </span>
                                      <?php endif; ?>
                                    </a>
                                    <!-- <div class="body"> -->
                                      <!-- <div class="list-group"> -->
                                        <?php foreach ($CategoryList as $row): ?>
                                          <a href="<?php echo site_url('Home/selectCategory/'.$row['category_id']); ?>" title="<?php echo $row['category_detail'] ?>" class="list-group-item waves-effectc">
                                            <?php echo $row['category_name']; ?>

                                            <?php if ($row['product_stock']>0): ?>
                                              <span class="badge bg-light-green">
                                                <?php echo $row['product_stock']; ?>
                                              </span>
                                            <?php else: ?>
                                              <span class="badge bg-red">
                                                <?php echo $row['product_stock']; ?>
                                              </span>
                                            <?php endif; ?>

                                          </a>
                                        <?php endforeach; ?>
                                      <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                            </div>
