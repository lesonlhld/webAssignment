<?php $news = $data['news'] ?? null ?>
<!--=== Shop Product ===-->
<div class="shop-product">
    <!-- Breadcrumbs v5 -->
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Tin Tức</a></li>
            <li class="active">Chi tiết</li>
        </ul>
    </div>
    <!-- End Breadcrumbs v5 -->
    <div class = "container">
    <div class="col-sm-12 col-lg-8">
                <div class="box box-primary">
                    <div class="box-body pad">
                        <div class="form-group">
                            <img src='<?= base_url("source/news/" . $news->image) ?>' alt='News Image' style='width:auto; max-height:100px'>
                            </br>
                        </div>
                        <div class = "form-group" >
                            <h2>
                            <?= isset($news)? $news->title : '' ?>
                            </br>
                            </h2>
                        </div>
                        <div class = "form-group">
                            <?= isset($news)? $news->short_content : '' ?>
                        </div>
                        <div class="form-group">
                            <?= isset($news) ?  $news->content : '' ?>
                        </div>
                        <div class = "form-group">
                            <ul class="list-inline overflow-h">
                                <li class ="pull-right"><span><?= isset($news) ? $news->first_name : ''?></span></li>
                                <li class ="pull-right"><span><?= isset($news) ? $news->last_name : ''?></span></li>
                                <li class ="pull-right"><span><?= isset($news) ? $news->create_at : ''?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>