    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Data Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Order</li>
            </ol>
        </section>
        <section class="content">
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
                            <table id="home_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px"><input type="checkbox" id="check-all"></th>
                                        <th>Order ID</th>
                                        <th>Customer name</th>
                                        <th>Order time</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Payment ID</th>
                                        <th>Voucher</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['order_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table</td><tr>";
                                    }
                                    foreach ($data['order_list'] as $order) {
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_item" class="check-list" value="<?= $order->order_id ?>">
                                            </td>
                                            <td><a href="<?= site_url('admin/order/view?id=' . $order->order_id); ?>"><?= $order->order_id ?></a> </td>
                                            <td><?= $order->first_name . $order->last_name ?> </td>
                                            <td><?= $order->order_time ?> </td>
                                            <td><?= $order->total ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= $order->order_status ?>
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Initialized'); ?>"><i class="fa fa-refresh"></i>Initialized</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Comfirmed'); ?>"><i class="fa fa-refresh"></i>Comfirmed</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Processing'); ?>"><i class="fa fa-refresh"></i>Processing</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Ready'); ?>"><i class="fa fa-refresh"></i>Ready</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Transporting'); ?>"><i class="fa fa-refresh"></i>Transporting</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Canceled'); ?>"><i class="fa fa-refresh"></i>Canceled</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Refused'); ?>"><i class="fa fa-refresh"></i>Refused</a></li>
                                                        <li><a href="<?= site_url('admin/order/change_status?id=' . $order->order_id . '&order_status=Completed'); ?>"><i class="fa fa-refresh"></i>Completed</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><?= $order->payment_method ?> </td>
                                            <td><?= $order->voucher ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?= site_url('admin/order/view?id=' . $order->order_id); ?>"><i class="fa fa-eye"></i>View</a></li>
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
                                echo (count($data['order_list']) > 0) ? "<i>Showing " . (($page - 1) * 10 + 1) . " to " . (($page - 1) * 10 + count($data['order_list'])) . "</i>" : "";
                                echo '<ul class="pagination no-margin pull-right">';

                                if ($page > 1) {
                                    echo '
                      <li><a href="' . site_url("admin/order/index?page=1") . '">&laquo;</a></li>
                      <li><a href="' . site_url("admin/order/index?page=" . ($page - 1)) . '">&lsaquo;</a></li>';
                                }
                                if ($page == 1) {
                                    echo '<li class="active"><a href="' . site_url("admin/order/index?page=$page") . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li><a href="' . site_url("admin/order/index?page=" . ($page - 1)) . '">' . ($page - 1) . '</a></li>
                      <li class="active"><a href="' . site_url("admin/order/index?page=" . $page) . '">' . $page . '</a></li>';
                                }
                                if (count($data['order_list']) == LIMIT) {
                                    echo '<li><a href="' . site_url("admin/order/index?page=" . ($page + 1)) . '">' . ($page + 1) . '</a></li>';
                                    echo '
                      <li><a href="' . site_url("admin/order/index?page=" . ($page + 1)) . '">&rsaquo;</a></li>
                      <li><a href="' . site_url("admin/order/index?page=" . $data['end_page']) . '">&raquo;</a></li>
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