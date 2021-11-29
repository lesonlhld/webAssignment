<?php $news = $data['news'] ?? null ?>
<!--=== Shop Product ===-->
<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Tin Tức</a></li>
        <li class="active">Chi tiết</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->
<div class="container">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body pad">
                <div class="form-group">
                    <?php if ($news->image != null) { ?>
                        <img src='<?= base_url("source/news/" . $news->image) ?>' alt='News Image' style='width:100%;'>
                    <?php } ?>
                </div>
                <h1>
                    <?= isset($news) ? $news->title : '' ?>
                    </br>
                </h1>
                <div class="form-group">
                    <ul class="list-inline overflow-h">
                        <li>
                            <span><?= isset($news) ? $news->first_name . ' ' . $news->last_name . ', ' . $news->create_at : "" ?></span>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <b><?= isset($news) ? $news->short_content : '' ?></b>
                </div>
                <div class="form-group">
                    <?= isset($news) ?  $news->content : '' ?>
                </div>
            </div>
        </div>
    </div>
</div>