    <?php $product = $data['product'] ?? null ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= isset($product) ? 'Edit product details' : 'Add new product' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Product</li>
                <li class="active"><?= isset($product) ? 'Edit' : 'Add' ?></li>
            </ol>
        </section>

        <section class="content">
            <!-- form start -->
            <form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
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
                                            <option value="<?= $category->category_id ?>" <?= isset($product) && $category->category_id == $product->category_id ? "selected" : '' ?>><?= $category->category_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="-1" hidden>Select status</option>
                                        <option value="1" <?= (isset($product) && $product->publish == 1) ? 'selected' : '' ?>>Active</option>
                                        <option value="0" <?= (!isset($product) || $product->publish == 0) ? 'selected' : '' ?>>Lock</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" placeholder="Choose image">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
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
                                    <textarea id="description" name="description" rows="10" cols="80"><?= isset($product) ?  $product->description : '' ?>
                                    </textarea>
                                </div>
                                <div class="form-group" id="attribute">
                                    <label for="description">Attribute</label>

                                    <a id="add-attribute" href="javascript:void(0)">
                                        <i class="fa fa-plus-circle"></i> Add new
                                    </a>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </form>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            CKEDITOR.replace('description');
            $("form").submit(function(e) {
                $("#msg").addClass('hidden');
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url("admin/product/save") . (isset($product) ? "?id=" . $product->product_id : "") ?>",
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

            $("#add-attribute").click(function(e) {
                $("#attribute").append(
                    document.getElementById("show-product").innerHTML
                );
            });
        });
    </script>


    <script id="show-product" type="text/html">
        <div class="row">
            <div class="form-group col-xs-3">
                <input type="text" name="attribute_name[]" class="form-control" placeholder="Name" value="">
            </div>
            <div class="form-group col-xs-8">
                <input type="text" name="attribute_value[]" class="form-control" placeholder="Value" value="">
            </div>
            <a class="mt-2" href="javascript:void(0)" onclick="$(this).parent().remove()">
                <i class="fa fa-times-circle"></i>
            </a>
        </div>
    </script>