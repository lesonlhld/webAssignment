<?php $category = $data['category'] ?? null ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= isset($category) ? 'Edit category details' : 'Add new category' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Category</li>
                <li class="active"><?= isset($category) ? 'Edit' : 'Add' ?></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                            <div class="box-body">
                                <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                                <div class="form-group">
                                    <label for="category name">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" value="<?= isset($category) ?  $category->category_name : '' ?>" placeholder="Enter category name">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= site_url('admin/category'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

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
                    url: "<?= site_url("admin/category/save") . (isset($category) ? "?id=" . $category->category_id : "") ?>",
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