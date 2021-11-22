<?php $news = $data['news'] ?? null ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>News details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>News</li>
            <li class="active">View</li>
        </ol>
    </section>

    <section class="content">
        <!-- form start -->
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">General Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= isset($news) ?  $news->title : '' ?>" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="short_content">Short content</label>
                            <input type="text" class="form-control" id="short_content" name="short_content" placeholder="Enter short content" value="<?= isset($news) ?  $news->short_content : '' ?>">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="publish" value="1" <?= isset($news) ?  ($news->publish == 1 ? "checked" : "") : "" ?> id="publish">Published
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="<?= site_url('admin/news'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>
                    </div>
                </div>
            </div>
            <!-- /.col -->


            <div class="col-sm-12 col-lg-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <?= isset($news) ?  $news->content : '' ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>