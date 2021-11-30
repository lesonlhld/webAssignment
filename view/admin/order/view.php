    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Detail
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Order</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Order Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="order_id">ID</label>
                                <input type="text" class="form-control" id="order_id" name="order_id" value="<?= $data['order']->order_id ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= $data['order']->first_name . ' ' . $data['order']->last_name ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="order_time">Order time</label>
                                <input type="text" class="form-control" id="order_time" name="order_time" value="<?= $data['order']->order_time ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="order_status">Status</label>
                                <input type="text" class="form-control" id="order_status" name="order_status" value="<?= $data['order']->order_status ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Total</label>
                                <input type="text" class="form-control" id="total" name="total" value="<?= $data['order']->total ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Payment method</label>
                                <input type="text" class="form-control" id="payment_method" name="payment_method" value="<?= $data['order']->payment_method ?>" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                                <label for="voucher">Voucher</label>
                                <input type="text" class="form-control" id="voucher" name="voucher" value="<?= $data['order']->voucher ?>" placeholder="" disabled>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="<?= site_url('admin/order'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-xs-8">
                    <div class="box">
                        <div class="box-body">
                            <div class="box-header with-border">
                                <h3 class="box-title">Order Products</h3>
                            </div>
                            <table id="home_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['product_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table</td><tr>";
                                    }
                                    $count = 1;
                                    foreach ($data['product_list'] as $product) {
                                    ?>
                                        <tr>
                                            <td><?= $count++ ?> </td>
                                            <td>
                                                <img src='<?= base_url("source/products/" . $product->image) ?>' alt='Product Image' style='width:auto; max-height:100px'>
                                            </td>
                                            <td><a href="<?= site_url('admin/product/view?id=' . $product->product_id); ?>"><?= $product->product_name ?></a> </td>
                                            <td><?= $product->price ?> </td>
                                            <td><?= $product->quantity ?> </td>
                                            <td><?= $product->price * $product->quantity ?> </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->

                        <script>
                            document.addEventListener("DOMContentLoaded", function(event) {
                                $('li').click(function() {
                                    $(this).addClass('active').siblings().removeClass('active');
                                });
                            });
                        </script>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>