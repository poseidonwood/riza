<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $title; ?></title>
   <!-- Favicon and touch icons -->
   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/ico/icon2.png" type="image/x-icon">
   <!-- Start Global Mandatory Style
         =====================================================================-->
   <!-- jquery-ui css -->
   <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />
   <!-- Bootstrap -->
   <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <!-- Lobipanel css -->
   <link href="<?php echo base_url(); ?>assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css" />
   <!-- Pace css -->
   <link href="<?php echo base_url(); ?>assets/plugins/pace/flash.css" rel="stylesheet" type="text/css" />
   <!-- Font Awesome -->
   <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <!-- Pe-icon -->
   <link href="<?php echo base_url(); ?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
   <!-- Themify icons -->
   <link href="<?php echo base_url(); ?>assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css" />
   <!-- End Global Mandatory Style
         =====================================================================-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
   <!-- Start page Label Plugins 
         =====================================================================-->
   <!-- Emojionearea -->
   <link href="<?php echo base_url(); ?>assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css" />
   <!-- Monthly css -->
   <link href="<?php echo base_url(); ?>assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css" />
   <!-- End page Label Plugins 
         =====================================================================-->
   <!-- Start Theme Layout Style
         =====================================================================-->
   <!-- Theme style -->
   <link href="<?php echo base_url(); ?>assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css" />
   <!-- Theme style rtl -->
   <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
   <!-- End Theme Layout Style
         =====================================================================-->
</head>

<body class="hold-transition sidebar-mini">
   <!--preloader-->
   <div id="preloader">
      <div id="status"></div>
   </div>
   <!-- Site wrapper -->
   <div class="wrapper">
      <header class="main-header">
         <a href="<?php echo base_url(); ?>" class="logo">
            <!-- Logo -->
            <span class="logo-mini">
               <img src="<?php echo base_url(); ?>assets/dist/img/mini-logo.png" alt="">
            </span>
            <span class="logo-lg">
               <img src="<?php echo base_url(); ?>assets/dist/img/logo4.png" alt="" width="150px" height="130px">
            </span>
         </a>
         <!-- Header Navbar -->
         <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <!-- Sidebar toggle button-->
               <span class="sr-only">Toggle navigation</span>
               <span class="pe-7s-angle-left-circle"></span>
            </a>
            <!-- searchbar-->
            <a href="#search"><span class="pe-7s-search"></span></a>
            <div id="search">
               <button type="button" class="close">×</button>
               <form>
                  <input type="search" value="" placeholder="Search.." />
                  <button type="submit" class="btn btn-add">Search...</button>
               </form>
            </div>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">

                  <!-- user -->
                  <li class="dropdown dropdown-user">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar6.png" class="img-circle" width="45" height="45" alt="user"></a>
                     <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>login/logout">
                              <i class="fa fa-sign-out"></i> Signout</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
         <!-- sidebar -->
         <div class="sidebar">
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
               <li class="active">
                  <a href="<?php echo base_url(); ?>admin"><i class="fa fa-laptop"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url(); ?>admin/buku"><i class="fa fa-book"></i><span>Daftar Buku</span>
                     <span class="pull-right-container">
                     </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url(); ?>admin/data_peminjam"><i class="fa fa-shopping-cart"></i><span>Peminjaman</span>
                     <span class="pull-right-container">
                     </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url(); ?>admin/data_pengembalian"><i class="fa fa-exchange"></i><span>Pengembalian</span>
                     <span class="pull-right-container">
                     </span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url(); ?>admin/data_member"><i class="fa fa-users"></i><span>Member</span>
                     <span class="pull-right-container">
                     </span>
                  </a>
               </li>
               <!-- <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Member</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="add-customer.html">Add Customer</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/data_member">Data Member</a></li>
                        <li><a href="group.html">Groups</a></li>
                     </ul>
                  </li> -->

            </ul>
         </div>
         <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="header-icon">
               <i class="fa fa-user-secret"></i>
            </div>
            <div class="header-title">
               <h1><?php echo $title; ?></h1>
               <small>Perpustakaan Online MA AL HASAN</small>
            </div>
         </section>