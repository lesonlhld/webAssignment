<?php $category = $data['category'] ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Category details
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Category</li>
                <li class="active">View</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category_id">Category ID</label>
                                <input type="text" class="form-control" id="category_id" name="category_id" value="<?= isset($category) ?  $category->category_id : '' ?>" placeholder="Oopsss!" disabled>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= isset($category) ?  $category->category_name : '' ?>" placeholder="Oopsss!" disabled>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="<?= site_url('admin/category'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                        </div>
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>