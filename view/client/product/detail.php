<?php $product = $data['product'] ?? null ?>
<!--=== Shop Product ===-->
<div class="shop-product">
    <!-- Breadcrumbs v5 -->
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
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
                            <img class="img-responsive sm-margin-bottom-20" src="<?= base_url("source/products/". $product->image)?>" alt="Product image">
                        </div>
                    </div>
                    <!-- End Master Slider -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop-product-heading">
                    <h2><?=$product->product_name?></h2>
                </div>
                <!--end shop product social-->

                <ul class="list-inline product-ratings margin-bottom-20">
                    <li><i class="rating<?php if ($product->rate >= 1) echo '-selected';?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate >= 2) echo '-selected';?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate >= 3) echo '-selected';?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate >= 4) echo '-selected';?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate == 5) echo '-selected';?> fa fa-star"></i></li>
                    <li class="product-review-list"><span><?=$data['count_comment']?> <a id="review-tab" href="#reviews">Đánh Giá</a> | <a id="review-tab" href="#review-add"> Thêm Đánh Giá</a></span></li>
                </ul>
                <!--end shop product ratings-->

                <span class="description"> <?= $product->description != null ? $product->description : 'Chưa có mô tả' ?> </span> <br> <br>
                <ul class="list-inline margin-bottom-20">
                    <li class="shop-product-prices shop-red">
                    <?= number_format($product->price * (100 - $product->discount) / 100) . " VND"?>
                    </li>
                    <li class="line-through">
                    <?php 
                        if ($product->discount > '0') {
                            echo '<span class="title-price line-through">' . number_format($product->price) . " VND". '</span>';
                        }
                    ?>
                    </li>
                    <li><br><small class="shop-bg-red time-day-left"> Bán Chạy Nhất </small></li>
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
                    <strong>Phân Loại:</strong> <a href="#"><?=$product->category_name?></a>
                </p>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!--=== End Shop Product ===-->

<!--=== Content Medium ===-->
<div class="content-md container">
    <div class="tab-v5">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#description" role="tab" data-toggle="tab">Mô tả</a></li>
            <li><a href="#reviews" role="tab" data-toggle="tab">Đánh giá
            (<?=$data['count_comment']?>)</a></li>
        </ul>

        <div class="tab-content">
            <!-- Description -->
            <div class="tab-pane fade in active" id="description">
                <div class="row">
                    <div class="col-md-12">
                        <?= $product->description != null ? $product->description : 'Chưa có mô tả' ?>
                        <br>
                        <h3 class="heading-md margin-bottom-20">Thông tin sản phẩm</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled specifies-list">
                                <?php if (isset($product)) {
                                $attributes = json_decode($product->attribute) ?? [];
                                if ($attributes == []){
                                    echo "Chưa có thông tin";
                                }
                                else{
                                    foreach ($attributes as $attribute) { ?>
                                        <li><i class="fa fa-caret-right"></i><?=$attribute->name?>: <span><?=$attribute->value?></span></li>
                                <?php
                                    }
                                }
                            }
                            ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Description -->

            <!-- Reviews -->
            <div class="tab-pane fade" id="reviews">
                <div class="product-comment margin-bottom-40">
                <?php if ($data['comment_list'] == []){
                    echo "Chưa có đánh giá nào";
                }
                else {
                     foreach ($data['comment_list'] as $comment) { ?>  
                    <div class="product-comment-in">
                        <img class="product-comment-img rounded-x" src="<?= base_url("source/users/". $comment->avatar)?>" alt="Avatar image">
                        <div class="product-comment-dtl">
                            <h4>
                                <?=$comment->first_name . ' ' . $comment->last_name ?><small><?=$comment->create_at?></small>
                            </h4>
                            <?=$comment->comment ?>
                            <ul class="list-inline product-ratings">
                                <li class="pull-right">
                                    <ul class="list-inline">
                                        <li><i class="rating<?php if ($comment->comment_rate >= 1) echo '-selected';?> fa fa-star"></i></li>
                                        <li><i class="rating<?php if ($comment->comment_rate >= 2) echo '-selected';?> fa fa-star"></i></li>
                                        <li><i class="rating<?php if ($comment->comment_rate >= 3) echo '-selected';?> fa fa-star"></i></li>
                                        <li><i class="rating<?php if ($comment->comment_rate >= 4) echo '-selected';?> fa fa-star"></i></li>
                                        <li><i class="rating<?php if ($comment->comment_rate == 5) echo '-selected';?> fa fa-star"></i></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php } 
                    }?>
                </div>
                <h3 id="review-add" class="heading-md margin-bottom-30">Thêm đánh giá</h3>
                <form action="#" method="post" class="sky-changes-4">
                    <fieldset>
                        <div class="margin-bottom-30">
                            <label class="label-v2">Đánh giá</label> <label class="textarea">
                                <textarea rows="7" name="comment" id="comment" value=""></textarea>
                            </label>
                        </div>
                    </fieldset>

                    <footer class="review-submit">
                        <label class="label-v2">Đánh giá</label>
                        <div class="stars-ratings">
                            <input type="radio" name="stars-rating" id="stars-rating-5">
                            <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-4">
                            <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-3">
                            <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-2">
                            <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-1">
                            <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                        </div>
                        <button type="button" class="btn-u btn-u-sea-shop btn-u-sm pull-right">Submit</button>
                    </footer>
                </form>
            </div>
            <!-- End Reviews -->
        </div>
    </div>
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
<script src="<?= site_url() ?>assets/plugins/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    function subtractQty() {
        if (document.getElementById("qty").value - 1 < 0)
            return;
        else
            document.getElementById("qty").value--;
    };
    
    $(document).on("click", "#review-tab", function(){
        $('ul li .active').removeClass("active").siblings().addClass("active");
    });

</script>