<?php $news = $data['news'] ?? null ?>
<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Tin tức</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Content Part ===-->
<div class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="filter-results">
                <?php foreach ($data['news_list'] as $news) { ?>
                <div class="list-product-description product-description-brd margin-bottom-30">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?= site_url() ."news/detail/?id=". $news->news_id?>">
                            <img class="img-responsive sm-margin-bottom-20" src="<?= base_url("source/news/". $news->image)?>" alt="News image"> 
                            </a>
                        </div>
                        <div class="col-sm-8 product-description">
                            <div class="overflow-h margin-bottom-5">
                                <ul class="list-inline overflow-h">
                                    <li>
                                        <h4 class="title-price">
                                            <a href="<?= site_url() ."news/detail/?id=".$news->news_id?>"><?= $news->title ?></a>
                                        </h4>
                                    </li>
                                    <li class="pull-right"><span></span>
                                    <a href="<?= site_url() ."news/detail/?id=".$news->news_id?>"><?= $news->create_at ?></a>
                                    </li>
                                    <li class="pull-right"><span>created by</span>
                                    <a href="<?= site_url() ."news/detail/?id=".$news->news_id?>"><?= $news->create_by ?></a>
                                    </li>
                                </ul>
                                <p class="margin-bottom-20"></p>
                                <a href="<?= site_url() ."news/detail/?id=".$news->news_id?>"><?= $news->short_content ?></a>
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