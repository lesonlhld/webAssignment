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
            <div class="col-sm-12 col-lg-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= isset($product) ? $product->product_name : '' ?>" placeholder="Enter name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" value="<?= isset($product) ? $product->price : '' ?>" placeholder="Enter price" disabled>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="0" value="<?= isset($product) ? $product->quantity : '' ?>" placeholder="Enter quantity" disabled>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" id="discount" name="discount" min="0" value="<?= isset($product) ? $product->discount : '' ?>" placeholder="Enter discount" disabled>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" disabled>
                                <option value="-1" hidden>Select category</option>
                                <?php foreach ($data['category_list'] as $category) { ?>
                                    <option value="<?= $category->category_id ?>" <?= isset($product) && $category->category_id == $product->category_id ? "selected" : '' ?>><?= $category->category_name ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" disabled>
                                <option value="-1" hidden>Select status</option>
                                <option value="1" <?= (isset($product) && $product->publish == 1) ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= (!isset($product) || $product->publish == 0) ? 'selected' : '' ?>>Lock</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <?php if (isset($product) && $product->image != "") { ?><img src='<?= base_url("source/products/" . $product->image) ?>' alt='Product Image' style='width:100%;'><?php } ?>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="<?= site_url('admin/product'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                    </div>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-sm-12 col-lg-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <?= isset($product) ? $product->description : '' ?>
                        </div>
                        <div class="form-group" id="attribute">
                            <label for="description">Attribute</label>
                            <?php if (isset($product)) {
                                $attributes = json_decode($product->attribute) ?? [];
                                foreach ($attributes as $attribute) { ?>
                                    <div class="row">
                                        <div class="form-group col-xs-3">
                                            <input type="text" name="attribute_name[]" class="form-control" placeholder="Name" value="<?= $attribute->name ?>" disabled>
                                        </div>
                                        <div class="form-group col-xs-8">
                                            <input type="text" name="attribute_value[]" class="form-control" placeholder="Value" value="<?= $attribute->value ?>" disabled>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>