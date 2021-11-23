<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Thực Đơn</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Content Part ===-->
<div class="content container">
    <div class="row">
        <div class="col-md-3 filter-by-block md-margin-bottom-60">
            <h1>Tìm kiếm</h1>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Tên Món Ăn<i class="fa fa-angle-down"></i>
                            </a>
                        </h2>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled checkbox-list">
                                <li>
                                    <form action="<?= site_url() ?>product/search" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" placeholder="Tìm kiếm..." />
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </span>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end panel group-->

            <div class="panel-group" id="accordion-v2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-v2" href="#collapseTwo">
                                Phân Loại <i class="fa fa-angle-down"></i>
                            </a>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled checkbox-list">
                                <li><a href="<?= site_url() ?>product/category?cate_id=">name</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end panel group-->

            <div class="panel-group" id="accordion-v3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-v3" href="#collapseThree">
                                Thương Hiệu <i class="fa fa-angle-down"></i>
                            </a>
                        </h2>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled checkbox-list">
                                <li><a href="<?= site_url() ?>product/stall?stall_id=">name</a><small>(item)</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end panel group-->

            <div class="panel-group margin-bottom-30" id="accordion-v5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-v5" href="#collapseFive">
                                Đánh Giá<i class="fa fa-angle-down"></i>
                            </a>
                        </h2>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="stars-ratings stars-ratings-label">
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
                        </div>
                    </div>
                </div>
            </div>

            <!--end panel group-->
            <button type="button" class="btn-u btn-brd btn-brd-hover btn-u-lg btn-u-sea-shop btn-block">Đặt Lại</button>
        </div>
        <div class="col-md-9">
            <div class="row margin-bottom-5">
                <div class="col-sm-4 result-category">
                    <small class="shop-bg-red badge-results">count Kết Quả</small>
                </div>
            </div>
            <!--end result category-->


            <div class="filter-results">
                <?php foreach ($data['product_list'] as $product) { ?>
                    <div class="list-product-description product-description-brd margin-bottom-30">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="<?= site_url() ?>product/detail?id=">
                                    <img class="img-responsive sm-margin-bottom-20" src="#" alt="">
                                </a>
                            </div>
                            <div class="col-sm-8 product-description">
                                <div class="overflow-h margin-bottom-5">
                                    <ul class="list-inline overflow-h">
                                        <li>
                                            <h4 class="title-price">
                                                <a href="<?= site_url() ?>product/detail?id="><?= $product->product_name ?></a>
                                            </h4>
                                        </li>
                                        <li><span class="category text-uppercase">category.name</span></li>
                                        <li class="pull-right">
                                            <ul class="list-inline product-ratings">
                                                <li><i class="rating-selected fa fa-star"></i></li>
                                                <li><i class="rating-selected fa fa-star"></i></li>
                                                <li><i class="rating-selected fa fa-star"></i></li>
                                                <li><i class="rating fa fa-star"></i></li>
                                                <li><i class="rating fa fa-star"></i></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="margin-bottom-10">
                                        <span class="title-price margin-right-10">
                                            price_discount
                                        </span>
                                        <c:if test="${p.discount != '0'}">
                                            <span class="title-price line-through">
                                                price
                                            </span>
                                        </c:if>
                                    </div>
                                    <p class="margin-bottom-20 stall-name">stall.name</p>
                                    <p class="margin-bottom-20">description</p>
                                    <a href="<?= site_url() ?>product/detail?id=">
                                        <button type="button" class="btn-u btn-u-sea-shop">Xem chi tiết</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                } ?>
            </div>
            <!--end filter results-->

            <div class="text-center">
                <ul class="pagination pagination-v2">
                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            <!--end pagination-->
        </div>
    </div>
    <!--end row-->
</div>
<!--end container-->
<!--=== End Content Part ===-->