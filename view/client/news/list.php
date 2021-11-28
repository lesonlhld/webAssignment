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

            <?php foreach ($data['news_list'] as $news) { ?>
                <div class="list-product-description product-description-brd margin-bottom-30">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?= site_url() . "news/detail/" . $news->slug ?>">
                                <img class="img-responsive sm-margin-bottom-20" src="<?= base_url("source/news/" . $news->image) ?>" alt="News image" style="width:100%;">
                            </a>
                        </div>
                        <div class="col-sm-8 product-description">
                            <div class="overflow-h margin-bottom-5">
                                <ul class="list-inline overflow-h">
                                    <li>
                                        <h4 class="title-price">
                                            <a href="<?= site_url() . "news/detail/" . $news->slug ?>"><?= $news->title ?></a>
                                        </h4>
                                    </li>

                                    <li class="pull-right">
                                        <span>
                                            <?= $news->create_at ?>
                                        </span>
                                    </li>
                                    <li class="pull-right">
                                        <span><?= $news->first_name . ' ' . $news->last_name ?></span>
                                    </li>
                                </ul>
                                <p class="margin-bottom-20"><?= $news->short_content ?></p>
                                </br>
                                <a href="<?= site_url() . "news/detail/" . $news->slug ?>">
                                    <button type="button" class="btn-u btn-u-sea-shop">Xem chi tiết</button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <!--end filter results-->

            <div class="text-center">
                <?php
                if (isset($data['page'])) {
                    $page = $data['page'];
                    echo '<ul class="pagination pagination-v2">';
                    if ($page > 1) {
                        echo '<li><a href="' . site_url() . "news/index?page=1" . '"><i class="fa fa-angle-double-left"></i></a></li>
                              <li><a href="' . site_url() . "news/index?page=" . ($page - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
                    }
                    if ($page == 1) {
                        echo '<li class="active"><a href="' . site_url() . "news/index?page=$page" . '">' . $page . '</a></li>';
                    } else {
                        echo '<li><a href="' . site_url() . "news/index?page=" . ($page - 1) . '">' . ($page - 1) . '</a></li>
                              <li class="active"><a href="' . site_url() . "news/index?page=" . $page . '">' . $page . '</a></li>';
                    }
                    if (count($data['news_list']) == LIMIT) {
                        echo '<li><a href="' . site_url() . "news/index?page=" . ($page + 1) . '">' . ($page + 1) . '</a></li>';
                        echo '<li><a href="' . site_url() . "news/index?page=" . ($page + 1) . '"><i class="fa fa-angle-right"></i></a></li>
                              <li><a href="' . site_url() . "news/index?page=" . $data['end_page'] . '"><i class="fa fa-angle-double-right"></i></a></li>
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