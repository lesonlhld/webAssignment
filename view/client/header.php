<?php
$CONFIGS_Model = Model('CONFIGS_Model');
$configs = $CONFIGS_Model->get();

$PRODUCT_Model = Model('PRODUCT_Model');
$CATEGORY_Model = Model('CATEGORY_Model');
$product_list = $PRODUCT_Model->get_list_active();
$category_list = $CATEGORY_Model->get_list();
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
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/headers/header-v5.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/footers/footer-v4.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/animate.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
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
                                        <li><a href="<?= site_url() ?>member/myaccount">T??i kho???n c???a t??i</a></li>
                                        <li><a href="<?= site_url() ?>member/order">Lich s??? mua h??ng</a></li>
                                        <li><a href="<?= site_url() ?>member/changepass">?????i m???t kh???u</a></li>
                                        <li><a href="<?= site_url() ?>auth/logout">????ng xu???t</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <script type="text/javascript">
                                function testAlertDialog() {
                                    alert("Vui l??ng ch???n m??n ??n tr?????c khi thanh to??n!");
                                }
                            </script>

                            <ul class="list-inline shop-badge badge-lists badge-icons pull-right">
                                <li><a href="<?= site_url() ?>cart"><i class="fa fa-shopping-cart"></i></a>
                                    <span class="badge badge-sea rounded-x num-product-cart">
                                        <?php
                                        if (!isset($_SESSION['cart'])) {
                                            echo 0;
                                        } else {
                                            echo count($_SESSION['cart']);
                                        }
                                        ?>
                                    </span>

                                    <ul class="list-unstyled badge-open mCustomScrollbar" data-mcs-theme="minimal-dark">
                                        <?php if (!isset($_SESSION["cart"])) { ?>
                                            <li>Gi??? h??ng tr???ng</li>
                                            <?php
                                        } else {
                                            foreach ($_SESSION["cart"] as $product_id => $item) { ?>
                                                <li class="cart-item-<?= $product_id ?>">
                                                    <img src="<?= base_url("source/products/" . $item["image"]) ?>" alt="Product image" width="10" height="20">
                                                    <button type="button" class="close" onclick="delete_item(<?= $product_id ?>)">??</button>
                                                    <div class="overflow-h">
                                                        <span><?= $item["name"] ?></span>
                                                        <small><?= number_format($item["quantity"] * $item["unit_price"]) . " VND" ?>
                                                        </small>
                                                    </div>
                                                </li>
                                        <?php }
                                        } ?>

                                        <li class="subtotal">
                                            <div class="overflow-h margin-bottom-10">
                                                <span>T???ng ti???n</span>
                                                <span class="pull-right subtotal-cost cart-total-pay">
                                                    <?php if (!isset($_SESSION['cart_total'])) {
                                                        echo 0;
                                                    } else {
                                                        echo number_format($_SESSION['cart_total']) . " VND";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <a href="<?= site_url() ?>cart" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">Xem Gi??? H??ng</a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="<?= site_url() ?>payment" <?php if (!isset($_SESSION['cart_total']) || $_SESSION['cart_total'] == 0) {
                                                                                            echo 'onclick="return false;"';
                                                                                        } ?> class="btn-u btn-u-sea-shop btn-block">Thanh To??n</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="nav navbar-nav  pull-right">
                                <li><a href="<?= site_url() ?>auth/login">????ng nh???p</a></li>
                                <li> <a href="<?= site_url() ?>auth/register">????ng k??</a></li>
                            </ul>
                        <?php } ?>

                        <!-- Nav Menu -->
                        <ul class="nav navbar-nav">
                            <!-- Trang ch??? -->
                            <li><a href="<?= site_url() ?>">Trang ch???</a></li>
                            <!-- End Trang ch??? -->

                            <!-- Menu -->
                            <li class="dropdown mega-menu-fullwidth">
                                <a href="<?= site_url() ?>product/list" class="dropdown-toggle" data-hover="dropdown">
                                    Th???c ????n
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="mega-menu-content">
                                            <div class="container">
                                                <div class="row">
                                                    <?php for ($i = 0; $i < (count($category_list) <= 6 ? count($category_list) : 6); $i++) {
                                                        if ($category_list[$i]->quantity > 0) ?>
                                                        <div class="col-md-2 col-sm-6">
                                                            <h3 class="mega-menu-heading"><?= $category_list[$i]->category_name ?></h3>
                                                            <ul class="list-unstyled style-list">
                                                                <?php
                                                                $count = 1;
                                                                for ($j = 0; $j < count($product_list); $j++) {
                                                                    if ($product_list[$j]->category_id == $category_list[$i]->category_id && $count < 6) {
                                                                        $count++;
                                                                ?>
                                                                        <li><a href="<?= site_url() . "product/detail?id=" . $product_list[$j]->product_id ?>"><?= $product_list[$j]->product_name ?></a></li>
                                                                <?php
                                                                    } else if ($count > 5) {
                                                                        break;
                                                                    }
                                                                } ?>
                                                            </ul>
                                                        </div>
                                                    <?php
                                                    } ?>
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

                            <!-- Khuy???n m??i -->
                            <li><a href="<?= site_url() ?>news">Tin t???c</a></li>
                            <!-- End Khuy???n m??i -->

                            <!-- V??? ch??ng t??i -->
                            <li><a href="#introduce-id">Gi???i thi???u</a></li>
                            <!-- End Gi???i thi???u -->
                        </ul>
                        <!-- End Nav Menu -->
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
        </div>
        <!--=== End Header v5 ===-->