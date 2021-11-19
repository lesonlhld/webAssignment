<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Lịch sử hóa đơn</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Information ===-->
<div class="content-md margin-bottom-30">
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
                                    <th>Ngày tạo hóa đơn</th>
                                    <th>Thơi gian tạo hóa đơn</th>
                                    <th>Mã giảm giá</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>${index }</td>
                                    <td>${list.id }</td>
                                    <td>${list.invoiceDate }</td>
                                    <td>${list.invoiceTime }</td>
                                    <td>${list.voucher }</td>
                                    <td>${list.totalMoney }</td>
                                    <td>${list.paymentMethod.name }</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </form>
    </div>
    <!--end container-->
</div>