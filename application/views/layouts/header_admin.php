<?php
if($this->session->privilege != 'Administrator')
    {
        redirect('home');
    }
?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MAJOO</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css')?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/summernote/summernote.css')?>" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/majoo_logo_small.png">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css')?>" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="<?php echo base_url('assets/vendors/select2/dist/css/select2.min.css')?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/vendors/select2/dist/js/select2.min.js')?>" defer></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('admin')?>" class="site_title"><span><center><b>MAJOO</b></center></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <center><img src="<?php echo base_url('assets/img/logos3.png')?>" width="75" height="75"></center>
            <div class="profile clearfix">
              <!-- <div class="profile_pic">
                <img src="<?php echo base_url('assets/img/majoo_logo_small.png')?>" alt="." class="img-circle profile_img">
              </div> -->
              <center>
              <div class="profile_info">
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span><b><?php echo $this->session->username ?><b></span>
              </div>
              </center>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>admin"><i class="fa fa-home"></i> Home </a></li>
                  <li><a><i class="fa fa-edit"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('pengguna/create')?>">Input User</a></li>
                      <li><a href="<?php echo base_url('pengguna/')?>">List User</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Kategori <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('kategori/create')?>">Input Kategori</a></li>
                      <li><a href="<?php echo base_url('kategori/')?>">List Kategori</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Produk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('produk/create')?>">Input Produk</a></li>
                      <li><a href="<?php echo base_url('produk/')?>">List Produk</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php base_url('Login/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-sign-out pull-right"> Log Out</i></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->