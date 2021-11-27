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
                <div class="col-sm-12 col-lg-6">
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
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= $data['order']->first_name . $data['order']->last_name ?>" placeholder="" disabled>
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
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-tools pull-left">
                                <!-- <a href=""><button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add order</button></a> -->
                                <!-- <button type="button" class="btn btn-default btn-sm" id="remove"><i class="fa fa-trash"></i> Remove</button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="box-header with-border">
                                <h3 class="box-title">Order Products</h3>
                            </div>
                            <table id="home_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px"><input type="checkbox" id="check-all"></th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['product_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table</td><tr>";
                                    }
                                    foreach ($data['product_list'] as $product) {
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_item" class="check-list" value="<?= $product->product_id ?>">
                                            </td>
                                            <td>
                                                <img src='<?= base_url("source/products/" . $product->image) ?>' alt='Product Image' style='width:auto; max-height:100px'>
                                            </td>
                                            <td><a href="<?= site_url('admin/product/view?id=' . $product->product_id); ?>"><?= $product->product_name ?></a> </td>
                                            <td><?= $product->price ?> </td>
                                            <td><?= $product->quantity ?> </td>
                                            <td><?= $product->category_name ?> </td>
                                            <td>
                                                <?= $product->publish == 1 ?
                                                    '<label class="label label-success">Active </label>' : '<label class="label label-warning">Locked </label>'
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?= site_url('admin/product/view?id=' . $product->product_id); ?>"><i class="fa fa-eye"></i>View</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer clearfix">
                            <?php
                            if (isset($data['page'])) {
                                $page = $data['page'];
                                echo (count($data['product_list']) > 0) ? "<i>Showing " . (($page - 1) * 10 + 1) . " to " . (($page - 1) * 10 + count($data['product_list'])) . "</i>" : "";
                                echo '<ul class="pagination no-margin pull-right">';

                                if ($page > 1) {
                                    echo '
                      <li><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=1") . '">&laquo;</a></li>
                      <li><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=" . ($page - 1)) . '">&lsaquo;</a></li>';
                                }
                                if ($page == 1) {
                                    echo '<li class="active"><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=$page") . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=" . ($page - 1)) . '">' . ($page - 1) . '</a></li>
                      <li class="active"><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=" . $page) . '">' . $page . '</a></li>';
                                }
                                if (count($data['product_list']) == LIMIT) {
                                    echo '<li><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=" . ($page + 1)) . '">' . ($page + 1) . '</a></li>';
                                    echo '
                      <li><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=" . ($page + 1)) . '">&rsaquo;</a></li>
                      <li><a href="' . site_url("admin/order/view?id=" . $data['order']->order_id . "&page=" . $data['end_page']) . '">&raquo;</a></li>
                      </ul>';
                                }
                            }
                            ?>
                        </div>

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

    <script>
        function get_checked() {
            var rows = $('#details tr');
            var a = [];
            rows.each(function() {
                if ($(this).find('#check_item').is(':checked')) {
                    var id = $(this).find('#check_item').val();
                    a.push(id);
                }
            });
            return a;
        }
    </script>