<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Giỏ Hàng</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Content Medium Part ===-->
<div class="content margin-bottom-30">
    <div class="container">
        <div class="shopping-cart">
            <div class="header-tags">
                <div class="overflow-h">
                    <h2>Hóa đơn của bạn</h2>
                </div>
            </div>
            <section>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Món</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data["order_items"] as $item) { ?>
                                <tr class="cart-item-<?= $item->product_id ?>">
                                    <td class="product-in-table"><img class="img-responsive" src="<?= base_url("source/products/" . $item->image) ?>" alt="Product image">
                                        <div class="product-it-in">
                                            <h3><?= $item->product_name ?></h3>
                                            <span><?= $item->description ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?= number_format($item->unit_price) . " VND" ?>
                                    </td>
                                    <td><?= $item->quantity ?></td>
                                    <td class="shop-red">
                                        <?= number_format($item->quantity * $item->unit_price) . " VND" ?>
                                    </td>
                                </tr>
                            <?php    }

                            ?>
                        </tbody>
                        <tbody>
                            <td></td>
                            <td><strong>TỔNG TIỀN</strong></td>
                            <td></td>
                            <td class="shop-red cart-total-pay">
                                <?= number_format($data['order']->total) . " VND" ?>
                            </td>
                            <td></td>
                        </tbody>

                    </table>
                </div>
            </section>
            <div class="header-tags">
                <div class="overflow-h">
                    <h2>Phương thức thanh toán</h2>
                </div>
            </div>
            <section>
                <div class="row">
                    <div class="col-md-6 md-margin-bottom-50">
                        <!-- Accordion -->
                        <span style="padding-left:15px;padding-right:50px;">
                            <input type="radio" id="sfcs" name="payment_method" value="1" <?= $data['order']->payment_id == 1 ? "checked" : "" ?> disabled>
                            <label for="sfcs">Tài khoản SFCS</label>
                        </span>
                        <span style="padding-right:50px;">
                            <input type="radio" id="momo" name="payment_method" value="2" <?= $data['order']->payment_id == 2 ? "checked" : "" ?> disabled>
                            <label for="momo">Ví Momo</label>
                        </span>
                        <input type="radio" id="cash" name="payment_method" value="3" <?= $data['order']->payment_id == 3 ? "checked" : "" ?> disabled>
                        <label for="cash">Tiền mặt</label>
                        <div class="coupon-code">
                            <h3>Mã giảm giá</h3>
                            <input class="form-control margin-bottom-10" name="voucher" type="text" value="<?= $data['order']->voucher != null ? $data['order']->voucher : '' ?>" disabled>
                        </div>
                        <ul class="list-inline total-result">
                            <li class="total-price">
                                <br>
                                <h4>Tổng Tiền:</h4>
                                <div class="total-result-in">
                                    <span class="cart-total-pay">
                                        <?= number_format($data['order']->total) . " VND" ?>
                                    </span>
                                </div>
                                <br>
                                <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                                <div>
                                    <a href="<?= site_url('member/order') ?>" class="btn-u btn-u-sea-shop btn-block">Xem lịch sử hóa đơn</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h2 class="title-type">Những câu hỏi thường gặp</h2>
                        <!-- Accordion -->
                        <div class="accordion-v2 plus-toggle">
                            <div class="panel-group" id="accordion-v2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-v2" href="#collapseOne-v2">
                                                Tôi có thể sử dụng phương thức nào để thanh toán trên SFCS?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-v2" class="panel-collapse collapse in">
                                        <div class="panel-body">Khi thanh toán đơn hàng, SFCS sẽ hỗ trợ bạn liên kết
                                            và thanh toán bằng tài khoản trên ví điện tử MoMo của bạn</div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion-v2" href="#collapseTwo-v2">
                                                Tôi có thể sử dụng voucher của các cửa hàng khi đặt hàng bằng SFCS được không ?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo-v2" class="panel-collapse collapse">
                                        <div class="panel-body">Hiện tại, SFCS chỉ áp dụng ưu đãi ứng với chương trình khuyến mãi của các cửa hàng.
                                            Khi đó, các món ăn được khuyến mãi sẽ tự động được cập nhật giá ưu đãi và hiện lên thông báo cho bạn.
                                            Vậy nên voucher là một hình thức khuyến mãi khác, bạn chỉ được áp dụng khi bạn mua hàng trực tiếp tại cửa hàng đó.

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion-v2" href="#collapseThree-v2">
                                                Làm thế nào để được hoàn tiền nếu như đơn hàng bị hủy sau khi đã thanh toán?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree-v2" class="panel-collapse collapse">
                                        <div class="panel-body">Hệ thống SFCS sẽ cập nhật liên tục số lượng hàng hóa tại các cửa hàng.
                                            Nếu như hết hàng, hệ thống sẽ báo lại và không cho phép bạn thực hiện thanh toán.
                                            Trường hợp xảy ra sai sót, bạn có thể liên hệ với tổng đài của chúng tôi qua SĐT: 0123.456.789 hoặc
                                            email: foodcourt@gmail.com
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion-v2" href="#collapseFour-v2">
                                                Khoảng bao lâu để tôi nhận được đơn hàng của mình ?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour-v2" class="panel-collapse collapse">
                                        <div class="panel-body">Điều này tùy thuộc vào thời gian chuẩn bị ở bếp và địa chỉ nhận đơn hàng của bạn.
                                            Tuy nhiên SFCS cam kết sẽ luôn thực hiện giao hàng trong thời gian sớm nhất có thể để đem đến cho bạn
                                            những bữa ăn thơm ngon và tiện lợi nhất.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Accordion -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--end container-->
</div>
<!--=== End Content Medium Part ===-->