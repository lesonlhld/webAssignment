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
                <div class="master-slider ms-skin-default" id="masterslider">
                    <div class="ms-slide">
                        <img class="img-responsive sm-margin-bottom-20" src="<?= base_url("source/products/" . $product->image) ?>" alt="Product image" style="width: 100%;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="shop-product-heading">
                    <h2><?= $product->product_name ?></h2>
                </div>
                <!--end shop product social-->

                <ul class="list-inline product-ratings margin-bottom-20">
                    <li><i class="rating<?php if ($product->rate >= 1) echo '-selected'; ?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate >= 2) echo '-selected'; ?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate >= 3) echo '-selected'; ?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate >= 4) echo '-selected'; ?> fa fa-star"></i></li>
                    <li><i class="rating<?php if ($product->rate == 5) echo '-selected'; ?> fa fa-star"></i></li>
                </ul>
                <!--end shop product ratings-->

                <span class="description"> <?= $product->description != null ? $product->description : 'Chưa có mô tả' ?> </span> <br> <br>
                <ul class="list-inline margin-bottom-20">
                    <li class="shop-product-prices shop-red">
                        <?= number_format($product->price * (100 - $product->discount) / 100) . " VND" ?>
                    </li>
                    <?php
                    if ($product->discount > '0') { ?>
                        <li class="line-through">
                            <span class="title-price line-through"><?= number_format($product->price) ?> VND</span>
                        </li>
                    <?php }
                    ?>
                    <?php
                    if ($product->hot == 1) { ?>
                        <li><br><small class="shop-bg-red time-day-left"> Bán Chạy Nhất </small></li>
                    <?php }
                    ?>
                </ul>
                <!--end shop product prices-->

                <h3 class="shop-product-title">Số Lượng</h3>
                <div class="margin-bottom-40">
                    <form id="cart-form" name="f1" class="product-quantity sm-margin-bottom-20" method="post" action="#">
                        <input type="text" name="product_id" value="<?= isset($product) ?  $product->product_id : '' ?>" class="hidden">
                        <button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty();' value='-'>-</button>
                        <input type='text' class="quantity-field" name='quantity' value="1" id='qty' />
                        <button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
                        <button type="submit" class="btn-u btn-u-sea-shop btn-u-lg">Thêm Vào Giỏ Hàng</button>
                    </form>
                </div>
                <!--end product quantity-->

                <br><br>
                <p class="wishlist-category">
                    <strong>Phân Loại:</strong> <a href="#"><?= $product->category_name ?></a>
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
            <li id="des" class="active"><a href="#description" role="tab" data-toggle="tab">Mô tả</a></li>
            <li id="rew"><a href="#reviews" role="tab" data-toggle="tab">Đánh giá
                    (<?= $data['count_comment'] ?>)</a></li>
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
                                        if ($attributes == []) {
                                            echo "Chưa có thông tin";
                                        } else {
                                            foreach ($attributes as $attribute) { ?>
                                                <li><i class="fa fa-caret-right"></i><?= $attribute->name ?>: <span><?= $attribute->value ?></span></li>
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
                    <?php if ($data['comment_list'] == []) {
                        echo "Chưa có đánh giá nào";
                    } else {
                        foreach ($data['comment_list'] as $comment) { ?>
                            <div class="product-comment-in">
                                <img class="product-comment-img rounded-x" src="<?= (isset($user) && $user->avatar != "") ? base_url("source/users/" . $comment->avatar) : base_url('assets/img/no-avatar.png') ?>" alt="Avatar image">
                                <div class="product-comment-dtl">
                                    <h4>
                                        <?= $comment->first_name . ' ' . $comment->last_name ?><small><?= $comment->create_at ?></small>
                                    </h4>
                                    <?= $comment->comment ?>
                                    <ul class="list-inline product-ratings">
                                        <li class="pull-right">
                                            <ul class="list-inline">
                                                <li><i class="rating<?php if ($comment->comment_rate >= 1) echo '-selected'; ?> fa fa-star"></i></li>
                                                <li><i class="rating<?php if ($comment->comment_rate >= 2) echo '-selected'; ?> fa fa-star"></i></li>
                                                <li><i class="rating<?php if ($comment->comment_rate >= 3) echo '-selected'; ?> fa fa-star"></i></li>
                                                <li><i class="rating<?php if ($comment->comment_rate >= 4) echo '-selected'; ?> fa fa-star"></i></li>
                                                <li><i class="rating<?php if ($comment->comment_rate == 5) echo '-selected'; ?> fa fa-star"></i></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
                <h3 id="review-add" class="heading-md margin-bottom-30">Thêm đánh giá</h3>
                <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                <form id="comment-form" action="javascript:void(0)" method="post">
                    <fieldset>
                        <div class="margin-bottom-30">
                            <label class="input">Bình luận cho sản phẩm</label>
                            <textarea cols="115" rows="4" name="comment" id="comment" class="form-control" placeholder="Nhập bình luận..." required></textarea>
                        </div>
                    </fieldset>
                    <input type="text" name="product_id" value="<?= isset($product) ?  $product->product_id : '' ?>" class="hidden">
                    <label class="input">Đánh giá sản phẩm</label>
                    <section>
                        <div class="stars-ratings stars-ratings-label">
                            <input type="radio" name="stars-rating" id="stars-rating-5" value="5" class="form-control" checked="checked">
                            <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-4" value="4" class="form-control">
                            <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-3" value="3" class="form-control">
                            <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-2" value="2" class="form-control">
                            <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                            <input type="radio" name="stars-rating" id="stars-rating-1" value="1" class="form-control">
                            <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                        </div>
                    </section>
                    <button type="submit" class="btn-u btn-u-sea-shop btn-u-sm margin-left-10">Gửi</button>
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

<script>
    function subtractQty() {
        if (document.getElementById("qty").value - 1 < 1)
            return;
        else
            document.getElementById("qty").value--;
    };

    document.addEventListener("DOMContentLoaded", () => {
        $("#comment-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('product/add_comment') ?>",
                type: 'post',
                data: $(this).serialize(),
                success: function(data) {
                    location.reload();
                },
                error: function(data) {
                    const obj = JSON.parse(JSON.stringify(data));
                    $("#msg").removeClass('hidden');
                    $("#msg").html(obj.responseJSON.msg);
                }
            });
        });

        $("#cart-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('cart/add') ?>",
                type: 'post',
                data: $(this).serialize(),
                success: function(data) {
                    location.reload();
                },
            });
        });


    });
</script>