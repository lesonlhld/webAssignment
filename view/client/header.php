<?php
$CONFIGS_Model = Model('CONFIGS_Model');
$configs = $CONFIGS_Model->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $configs->site_name ?></title>
    <!-- GOOGLE FONTS-->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/shop.style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/headers/header-v5.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/footers/footer-v4.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/animate.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/revolution-slider/rs-plugin/css/settings.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/custom.css">

    <!-- CSS Page Styles -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/pages/form-input.css">
</head>

<body class="header-fixed">
    <div class="wrapper">
        <!--=== Header v5 ===-->
        <div class="header-v5 header-${url}">
            <!-- Navbar -->


            <div class="navbar navbar-default mega-menu" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= site_url() ?>">
                            <img id="logo-header" src="<?= site_url() ?>assets/img/logo.png" alt="Logo" style="width:120px; height:50px;">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <?php
                        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) { ?>
                            <ul class="list-inline shop-badge badge-lists badge-icons pull-right">
                                <li><a href="<?= site_url() ?>member/myaccount"><i class="fa fa-user"></i>Hi, <?= $_SESSION['lastname'] ?></a>
                                    <ul class="list-unstyled badge-open2 mCustomScrollbar2" data-mcs-theme="minimal-dark">
                                        <li><a href="<?= site_url() ?>member/myaccount">Tài khoản của tôi</a></li>
                                        <li><a href="<?= site_url() ?>member/invoice">Lich sử mua hàng</a></li>
                                        <li><a href="<?= site_url() ?>auth/logout">Đăng xuất</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <script type="text/javascript">
                                function testAlertDialog() {
                                    alert("Vui lòng chọn món ăn trước khi thanh toán!");
                                }
                            </script>

                            <ul class="list-inline shop-badge badge-lists badge-icons pull-right">
                                <li><a href="<?= site_url() ?>member/cart"><i class="fa fa-shopping-cart"></i></a>
                                    <span class="badge badge-sea rounded-x">0</span>

                                    <ul class="list-unstyled badge-open mCustomScrollbar" data-mcs-theme="minimal-dark">
                                        <li>
                                            <img src="#" alt="" width="10" height="20">
                                            <a href="<?= site_url() ?>member/cart/remove?pId= ">
                                                <button type="button" class="close">×</button></a>
                                            <div class="overflow-h">
                                                <span>product.name</span>
                                                <small>quantity *
                                                    price_discount
                                                </small>
                                            </div>
                                        </li>

                                        <li class="subtotal">
                                            <div class="overflow-h margin-bottom-10">
                                                <span>Tổng tiền</span>
                                                <span class="pull-right subtotal-cost">
                                                    total
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <a href="<?= site_url() ?>member/cart" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">Xem Giỏ Hàng</a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="<?= site_url() ?>member/order" class="btn-u btn-u-sea-shop btn-block">Thanh Toán</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="nav navbar-nav  pull-right">
                                <li><a href="<?= site_url() ?>auth/login">Đăng nhập</a></li>
                                <li> <a href="<?= site_url() ?>auth/register">Đăng ký</a></li>
                            </ul>
                        <?php } ?>

                        <!-- Nav Menu -->
                        <ul class="nav navbar-nav">
                            <!-- Trang chủ -->
                            <li><a href="<?= site_url() ?>">Trang chủ</a></li>
                            <!-- End Trang chủ -->

                            <!-- Menu -->
                            <li class="dropdown mega-menu-fullwidth">
                                <a href="<?= site_url() ?>product/list" class="dropdown-toggle" data-hover="dropdown">
                                    Thực đơn
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="mega-menu-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Ẩm thực Việt</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/detail?id=2">Cơm Gà Xối Mỡ</a><span class="label label-danger-shop">Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/detail?id=1">Phở Bò Tái Chín</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Thức ăn nhanh</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/detail?id=6">Combo Gà Giòn Cay</a><span class="label label-danger-shop">Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/detail?id=7">Pizza Hải Sản</a></li>
                                                            <li><a href="<?= site_url() ?>product/detail?id=8">Burger Bò Phô Mai</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Lẩu & Nướng</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/detail?id=4">Lẩu Cua Cà Ri</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Thức uống</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/detail?id=10">Trà Đào Cam Sả</a><span class="label label-danger-shop">Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/detail?id=11">Trà Sữa Phúc Long (Lạnh)</a></li>
                                                            <li><a href="<?= site_url() ?>product/detail?id=12">Sữa Tươi Trân Châu Đường Hổ</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Tráng miệng</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/detail?id=9">Bánh Crepe Chuối</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Các món khác</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/detail?id=3">Kimbap</a><span class="label label-danger-shop">Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/detail?id=5">Bò Ba Chỉ Với Trứng</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end container-->
                                        </div>
                                        <!--end mega menu content-->
                                    </li>
                                </ul>
                                <!--end dropdown-menu-->

                            </li>
                            <!-- End Menu -->

                            <!-- Brand -->
                            <li class="dropdown mega-menu-fullwidth">
                                <a href="<?= site_url() ?>product/list" class="dropdown-toggle" data-hover="dropdown">
                                    Thương Hiệu
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="mega-menu-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Ẩm thực Việt</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=1">Cơm Nguyên Ký</a><span class="label label-danger-shop">Có Món Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=2">Phở 10 Lý Quốc Sư</a></li>

                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Thức ăn nhanh</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=4">KFC</a><span class="label label-danger-shop">Có Món Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=5">Pizza Hut</a></li>
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=6">McDonald's</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Lẩu & Nướng</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=3">Hoàng Yến Cuisine</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Thức uống</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=10">The Royal Tea</a><span class="label label-danger-shop">Có Món Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=11">Phúc Long Coffee & Tea</a></li>
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=12">Trà sữa Toco Toco</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Tráng miệng</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=9">Tous Les Jours</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <h3 class="mega-menu-heading">Các món khác</h3>
                                                        <ul class="list-unstyled style-list">
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=8">Hanuri</a><span class="label label-danger-shop">Có Món Mới</span></li>
                                                            <li><a href="<?= site_url() ?>product/stall?stall_id=7">Hotto</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end container-->
                                        </div>
                                        <!--end mega menu content-->
                                    </li>
                                </ul>
                                <!--end dropdown-menu-->

                            </li>
                            <!-- End Menu -->

                            <!-- Khuyến mãi -->
                            <li><a href="<?= site_url() ?>">Tin tức</a></li>
                            <!-- End Khuyến mãi -->

                            <!-- Về chúng tôi -->
                            <li><a href="#introduce-id">Giới thiệu</a></li>
                            <!-- End Giới thiệu -->
                        </ul>
                        <!-- End Nav Menu -->
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
        </div>
        <!--=== End Header v5 ===-->