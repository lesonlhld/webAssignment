<!--=== Shop Product ===-->
<div class="shop-product">
    <!-- Breadcrumbs v5 -->
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Món Ăn</a></li>
            <li class="active">Chi tiết</li>
        </ul>
    </div>
    <!-- End Breadcrumbs v5 -->


    <div class="container">
        <div class="row">
            <div class="col-md-6 md-margin-bottom-50">
                <div class="ms-showcase2-template">
                    <!-- Master Slider -->
                    <div class="master-slider ms-skin-default" id="masterslider">
                        <div class="ms-slide">
                            <img class="ms-brd" src="<?= site_url() ?>assets/img/blank.gif" data-src="#" alt="${product.name }">
                        </div>
                    </div>
                    <!-- End Master Slider -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop-product-heading">
                    <h2>${product.name }</h2>
                </div>
                <!--end shop product social-->

                <ul class="list-inline product-ratings margin-bottom-20">
                    <li><i class="rating-selected fa fa-star"></i></li>
                    <li><i class="rating-selected fa fa-star"></i></li>
                    <li><i class="rating-selected fa fa-star"></i></li>
                    <li><i class="rating fa fa-star"></i></li>
                    <li><i class="rating fa fa-star"></i></li>
                    <li class="product-review-list"><span>(1) <a href="#">Đánh Giá</a> | <a href="#"> Thêm Đánh Giá</a></span></li>
                </ul>
                <!--end shop product ratings-->

                <span class="stall-name"> ${product.stall.name } </span> <br>
                <span class="deriptoion"> ${product.description } </span> <br> <br>
                <ul class="list-inline margin-bottom-20">
                    <li class="shop-product-prices shop-red">
                        price_discount
                    </li>
                    <li class="line-through">
                        price
                    </li>
                    <li><small class="shop-bg-red time-day-left"> Bán Chạy Nhất </small></li>
                </ul>
                <!--end shop product prices-->

                <h3 class="shop-product-title">Số Lượng</h3>
                <div class="margin-bottom-40">
                    <form name="f1" class="product-quantity sm-margin-bottom-20" method="get" action="#">
                        <input type="text" value="${product.id }" name="pId" hidden="">
                        <button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty();' value='-'>-</button>
                        <input type='text' class="quantity-field" name='quantity' value="1" id='qty' />
                        <button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
                        <button type="submit" class="btn-u btn-u-sea-shop btn-u-lg">Thêm Vào Giỏ Hàng</button>
                    </form>
                </div>
                <!--end product quantity-->

                <br><br>
                <p class="wishlist-category">
                    <strong>Phân Loại:</strong> <a href="#">${product.category.name}</a>
                </p>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!--=== End Shop Product ===-->

<!--=== Content Medium ===-->
<div class="content-md container">
    <div class="row margin-bottom-60">
        <div class="col-md-6 product-service md-margin-bottom-30">
            <div class="product-service-heading">
                <i class="fa fa-truck"></i>
            </div>
            <div class="product-service-in">
                <h3>Đặt hàng nhanh chóng, tiện lợi</h3>
                <p> Chỉ với 1 cú click chuột tại nhà, SCFC sẽ đem đến
                    cho bạn những bữa ăn ngon miệng với tốc độ sấm sét...</p>
                <a href="#">+Xem thêm</a>
            </div>
        </div>
        <div class="col-md-6 product-service md-margin-bottom-30">
            <div class="product-service-heading">
                <i class="icon-earphones-alt"></i>
            </div>
            <div class="product-service-in">
                <h3>Chăm sóc khách hàng</h3>
                <p>Phương châm của SCFS là khách hàng còn hơn cả thượng đế. Chúng tôi
                    luôn sẵn sàng lắng nghe những ý kiến đóng góp của quý khách hàng...</p>
                <a href="#">+Xem thêm</a>
            </div>
        </div>
    </div>
    <!--end row-->
    <!--=== End Product Service ===-->
</div>
<!--end container-->
<!--=== End Content Medium ===-->

<script>
    function subtractQty() {
        if (document.getElementById("qty").value - 1 < 0)
            return;
        else
            document.getElementById("qty").value--;
    }
</script>