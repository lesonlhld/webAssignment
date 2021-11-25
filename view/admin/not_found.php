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
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/adminlte/bower_components/jvectormap/jquery-jvectormap.css') ?>">
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
                        <a href="<?= site_url('admin/dashboard'); ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- /.sidebar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <!--=== Error ===-->
                        <div>
                            <img src="<?= site_url() ?>assets/img/404.gif" alt="Not Found" style="width:100%;">
                        </div>
                        <!--=== End Error ===-->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div><!-- Footer -->
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>
        <!-- /.footer -->

    </div>
    <!-- ./wrapper -->

    <!-- JS -->
    </script>
    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
    <!-- jvectormap -->
    <script src="<?= base_url('assets/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/moment/min/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url('assets/plugins/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/plugins/adminlte/bower_components/fastclick/lib/fastclick.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/plugins/adminlte/dist/js/adminlte.min.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/plugins/adminlte/dist/js/demo.js') ?>"></script>
</body>

</html>