<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/Ionicons/css/ionicons.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/dist/css/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/dist/css/skins/_all-skins.min.css') ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/morris.js/morris.css') ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/jvectormap/jquery-jvectormap.css') ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/select2/dist/css/select2.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/img/no-avatar.png') ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $_SESSION['lastname'] ?? $_SESSION['email'] ?? "" ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/img/no-avatar.png') ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $_SESSION['lastname'] ?? $_SESSION['email'] ?? "" ?>
                                        <small><?= $_SESSION['role'] ?? "" ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="" class="btn btn-default btn-flat">Change password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url() ?>admin/auth/logout" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- /.header -->

        <!-- Sidebar -->
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="active">
                        <a href="<?= site_url('/'); ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="header">SYSTEM SETTINGS</li>
                    <li>
                        <a href="<?= site_url('admin/configs'); ?>">
                            <i class="fa fa-cog"></i> <span>Configs</span>
                        </a>
                    </li>
                    <li class="header">CONTENT MODULES</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-sitemap"></i> <span>Branches</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('branches/'); ?>"><i class="fa fa-list"></i>Branches List</a></li>
                            <li><a href="<?= site_url('branches/trash'); ?>"><i class="fa fa-trash-o"></i>Branches Trash</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="<?= site_url("employees") ?>">
                            <i class="fa fa-users"></i> <span>User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('admin/user'); ?>"><i class="fa fa-list"></i> User List</a></li>
                            <li><a href="<?= site_url('admin/user/trash'); ?>"><i class="fa fa-trash-o"></i> User Trash</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cutlery"></i> <span>Product</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('admin/product'); ?>"><i class="fa fa-list"></i>Product List</a></li>
                            <li><a href="<?= site_url('admin/product/trash'); ?>"><i class="fa fa-trash-o"></i>Product Trash</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i> <span>Orders</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('Orders/home'); ?>"><i class="fa fa-list"></i>Orders List</a></li>
                            <li><a href="<?= site_url('Orders/trash'); ?>"><i class="fa fa-trash-o"></i>Orders Trash</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-id-card-o"></i> <span>Customer</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('admin/customer'); ?>"><i class="fa fa-list"></i> Customer List</a></li>
                            <li><a href="<?= site_url('admin/customer/trash'); ?>"><i class="fa fa-trash-o"></i> Customer Trash</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-usd"></i> <span>Revenue</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">new</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- /.sidebar -->