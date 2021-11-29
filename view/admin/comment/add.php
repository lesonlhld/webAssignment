<?php $comment = $data['comment'] ?? null ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= isset($comment) ? 'Edit comment details' : 'Add new comment' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Comment</li>
                <li class="active"><?= isset($comment) ? 'Edit' : 'Add' ?></li>
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
                        <form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                            <div class="box-body">
                                <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                                <div class="form-group">
                                    <label for="comment_id">ID</label>
                                    <input type="text" class="form-control" id="comment_id" name="comment_id" value="<?= isset($comment) ?  $comment->comment_id : '' ?>" placeholder="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate</label>
                                    <input type="text" class="form-control" id="rate" name="rate" value="<?= isset($comment) ?  $comment->comment_rate : '' ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input type="text" class="form-control" id="content" name="content" value="<?= isset($comment) ?  $comment->comment : '' ?>" placeholder="">
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
                                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= site_url('admin/comment'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $("form").submit(function(e) {
                $("#msg").addClass('hidden');
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url("admin/comment/save") . (isset($comment) ? "?id=" . $comment->comment_id : "") ?>",
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        $("#msg").removeClass('alert-danger');
                        $("#msg").addClass('alert-success');
                        $("#msg").removeClass('hidden');
                        $("#msg").html(data.msg);
                    },
                    error: function(data) {
                        const obj = JSON.parse(JSON.stringify(data));

                        $("#msg").removeClass('alert-success');
                        $("#msg").addClass('alert-danger');
                        $("#msg").removeClass('hidden');
                        $("#msg").html(obj.responseJSON.msg);
                    }
                });
            });
        });
    </script>