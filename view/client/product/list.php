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
                    <?php foreach ($data['category_list'] as $category) { ?>  
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-unstyled checkbox-list">
                                <li><a href="<?= site_url() . "product/category?cate_id=" . $category->category_id ?>"><?= $category->category_name ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!--end panel group-->

            
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
                    <small class="shop-bg-red badge-results">Danh sách hiện có: <?= count($data['product_list']) ?> món ăn</small>
                </div>
            </div>
            <!--end result category-->


            <div class="filter-results">
                <?php foreach ($data['product_list'] as $product) { ?>
                    <div class="list-product-description product-description-brd margin-bottom-30">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="<?= site_url() ."product/detail?id=" . $product->product_id ?>">
                                    <img class="img-responsive sm-margin-bottom-20" src="<?= base_url("source/products/". $product->image)?>" alt="Product image">
                                </a>
                            </div>
                            <div class="col-sm-8 product-description">
                                <div class="overflow-h margin-bottom-5">
                                    <ul class="list-inline overflow-h">
                                        <li>
                                            <h4 class="title-price">
                                                <a href="<?= site_url() . "product/detail?id=" . $product->product_id ?>"><?= $product->product_name ?></a>
                                            </h4>
                                        </li>
                                        <li>
                                            <span class="category text-uppercase">
                                                <?= 
                                                    $product->category_name 
                                                ?>
                                            </span></li>
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
                                        <?= $product->price * (100 - $product->discount) / 100?>
                                        </span>
                                        <?php 
                                            if ($product->discount > '0') {
                                                echo '<span class="title-price line-through">' . $product->price .'</span>';
                                            }
                                        ?>
                                    </div>
                                    <p class="margin-bottom-20"><?= $product->description ?></p>
                                    <a href="<?= site_url() . "product/detail?id=" . $product->product_id ?>">
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
            <?php
                if (isset($data['page'])) {
                    $page = $data['page'];
                    echo '<ul class="pagination pagination-v2">';
                    if ($page > 1) {
                        echo '<li><a href="' . site_url() . "product/list?page=1" . '"><i class="fa fa-angle-left"></i></a></li>
                              <li><a href="' . site_url() . "product/list?page=" . ($page - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
                    }
                    if ($page == 1) {
                        echo '<li class="active"><a href="' . site_url() . "product/list?page=$page" . '">' . $page . '</a></li>';
                    } else {
                        echo '<li><a href="' . site_url() . "product/list?page=" . ($page - 1) . '">' . ($page - 1) . '</a></li>
                              <li class="active"><a href="' . site_url() . "product/list?page=" . $page . '">' . $page . '</a></li>';
                    }
                    if (count($data['product_list']) == LIMIT) {
                        echo '<li><a href="' . site_url() . "product/list?page=" . ($page + 1) . '">' . ($page + 1) . '</a></li>';
                        echo '<li><a href="' . site_url() . "product/list?page=" . ($page + 1) . '"><i class="fa fa-angle-right"></i></a></li>
                              <li><a href="' . site_url() . "product/list?page=" . $data['end_page'] . '"><i class="fa fa-angle-right"></i></a></li>
                              </ul>';
                    }
                }    
            ?>
            </div>
            <!--end pagination-->
        </div>
    </div>
    <!--end row-->
</div>
<!--end container-->
<!--=== End Content Part ===-->