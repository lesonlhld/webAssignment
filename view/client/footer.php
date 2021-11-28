<?php
$CONFIGS_Model = Model('CONFIGS_Model');
$configs = $CONFIGS_Model->get();
?>

<!--=== Footer v4 ===-->
<div class="footer-v4">
    <div class="footer" id="introduce-id">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-4 md-margin-bottom-40">
                    <h2 class="thumb-headline">Thông tin liên lạc</h2>
                    <ul class="list-unstyled address-list margin-bottom-20">
                        <li><i class="fa fa-angle-right"></i><?= $configs->address ?></li>
                        <li><i class="fa fa-angle-right"></i>Điện thoại: <?= $configs->phone ?></li>
                        <li><i class="fa fa-angle-right"></i>Email: <?= $configs->email ?></li>
                    </ul>
                </div>

                <div class="col-md-4 md-margin-bottom-40">
                    <h2 class="thumb-headline">Mạng xã hội</h2>
                    <ul class="list-inline shop-social">

                        <li><a href="#"><i class="fb rounded-md fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="in rounded-md fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="yt rounded-md fa fa-youtube"></i></a></li>
                    </ul>
                </div>

                <div class="col-md-4 md-margin-bottom-40">
                    <h2 class="thumb-headline">Thời gian mở cửa</h2>
                    <ul class="list-unstyled address-list margin-bottom-20">
                        <li><i class="fa fa-angle-right"></i>Thứ 2 - Chủ Nhật: 9AM - 8PM</li>
                    </ul>
                </div>
                <!-- End About -->

            </div>
            <!--end row-->
        </div>
        <!--end continer-->
    </div>
    <!--footer-->

    <div class="copyright">
        <div class="container">
            <div class="col-md-6">
                <p>
                    BK Food Court
                </p>
            </div>
        </div>
    </div>
    <!--copyright-->
</div>
<!--=== End Footer v4 ===-->
</div>
<!--wrapper-->

<!-- JS Global Compulsory -->
<script src="<?= site_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="<?= site_url() ?>assets/plugins/back-to-top.js"></script>
<script src="<?= site_url() ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script src="<?= site_url() ?>assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= site_url() ?>assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- JS Customization -->
<script src="<?= site_url() ?>assets/js/custom.js"></script>
<!-- JS Page Level -->
<script src="<?= site_url() ?>assets/js/shop.app.js"></script>
<script src="<?= site_url() ?>assets/js/plugins/owl-carousel.js"></script>
<script src="<?= site_url() ?>assets/js/plugins/revolution-slider.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        App.initScrollBar();
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullWidth();
    });
    
    function delete_item(product_id){
        $.ajax({
            url: "<?= site_url('cart/delete_item') ?>",
            type: "get",
            data: "product_id=" + product_id,
            success: function(data){
                $(".cart-item-" + product_id).remove();
                $("#cart-total-update").html(data.total);
                $(".cart-total-pay").html(data.total);
                $(".num-product-cart").html(data.num_product);
            }
        })
    };
</script>
</body>

</html>