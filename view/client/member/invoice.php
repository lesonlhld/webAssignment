<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Lịch sử hóa đơn</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Information ===-->
<div class="content margin-bottom-30">
    <div class="container">
        <form class="shopping-cart" action="#">
            <div>
                <div class="header-tags">
                    <div class="overflow-h">
                        <h2>Lịch sử hóa đơn</h2>
                    </div>
                </div>
                <section>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Mã hóa đơn</th>
                                    <th>Thời gian tạo</th>
                                    <th>Mã giảm giá</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $index = 1;
                                foreach($data['order_list'] as $order) {?>
                                <tr class="odd gradeX">
                                    <td><?=$index?></td>
                                    <td><?=$order->order_id?></td>
                                    <td><?=$order->order_time?></td>
                                    <td><?=$order->voucher != null ? $order->voucher : "Không có"?></td>
                                    <td><?=number_format($order->total) . " VND"?></td>
                                    <td><?=$order->payment_method?></td>
                                </tr>
                            <?php 
                                    $index += 1;
                                }?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </form>
    </div>
    <!--end container-->
</div>