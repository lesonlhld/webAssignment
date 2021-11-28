<?php $comment = $data['comment'] ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Comment details
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Comment</li>
                <li class="active">View</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Comment Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="comment_id">ID</label>
                                <input type="text" class="form-control" id="comment_id" name="comment_id" value="<?= isset($comment) ?  $comment->comment_id : '' ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="rate">Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" value="<?= isset($comment) ?  $comment->comment_rate : '' ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" id="content" name="content" value="<?= isset($comment) ?  $comment->comment : '' ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="create_at">Create at</label>
                                <input type="text" class="form-control" id="create_at" name="create_at" value="<?= isset($comment) ?  $comment->create_at : '' ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="create_by">Create by</label>
                                <input type="text" class="form-control" id="create_by" name="create_by" value="<?= isset($comment) ?  $comment->first_name . $comment->last_name : '' ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="product">Product</label>
                                <input type="text" class="form-control" id="product" name="product" value="<?= isset($comment) ?  $comment->product_name : '' ?>" placeholder="" disabled>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="<?= site_url('admin/comment'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                        </div>
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>