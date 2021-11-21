    <?php $product = $data['product'] ?? null ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Product details
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Product</li>
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
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= isset($product) ?  $product->product_name : '' ?>" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" min="0" value="<?= isset($product) ?  $product->price : '' ?>" placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="0" value="<?= isset($product) ?  $product->quantity : '' ?>" placeholder="Enter quantity">
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" id="discount" name="discount" min="0" value="<?= isset($product) ?  $product->discount : '' ?>" placeholder="Enter discount">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="-1" hidden>Select category</option>
                                    <?php foreach ($data['category_list'] as $category) { ?>
                                        <option value="<?= $category->category_id ?>" <?= $category->category_id == $product->category_id ? "selected" : '' ?>><?= $category->category_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="-1" hidden>Select status</option>
                                    <option value="1" <?= (isset($news) && $news->publish == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= (!isset($news) || $news->publish == 0) ? 'selected' : '' ?>>Lock</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" value="<?= isset($product) ?  $product->description : '' ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="<?= site_url('admin/product'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                        </div>
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>