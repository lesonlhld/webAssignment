<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Đăng ký</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Register ===-->
<div class="form-input content margin-bottom-30">
    <div class="container">
        <div class="row">
            <div class="col-md-7 md-margin-bottom-50">
                <h2 class="welcome-title">Chào mừng bạn đến với SFCS</h2>
                <p>SFCS được Trường Đại Học Bách Khoa TP.HCM thiết lập và hoạt động vào tháng 5/2020.</p>
                <p>BK Food Court sẽ đem cho các bạn những món ăn ngon, bổ dưỡng và an toàn vệ sinh.</p>
                <br>
                <div class="row margin-bottom-50">
                    <div class="col-sm-4 md-margin-bottom-20">
                        <div class="site-statistics">
                            <span>50+</span> <small>Món ăn</small>
                        </div>
                    </div>
                    <div class="col-sm-4 md-margin-bottom-20">
                        <div class="site-statistics">
                            <span>2345</span> <small>Thành viên</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="site-statistics">
                            <span>6h30 - 21h00</span> <small>Giờ hoạt động</small>
                        </div>
                    </div>
                </div>
                <div class="members-number">
                    <h3>
                        Địa chỉ: Đại học Bách Khoa Tp. Hồ Chí Minh, Quận Thủ Đức, Thành phố Hồ Chí Minh
                    </h3>
                    <img class="img-responsive" src="<?= site_url() ?>assets/img/address.png" alt="">
                </div>
            </div>

            <div class="col-md-5">
                <form id="" class="form-input-block" action="javascript:void(0)" method="post">
                    <h2>Đăng ký tài khoản</h2>
                    <div id="msg" class="text-center alert alert-danger hidden" style="border-radius: .5rem;"></div>

                    <div class="login-input reg-input">
                        <div class="row">
                            <div class="col-md-6 md-margin-bottom-50">
                                <section>
                                    <label class="input">Họ<span style="color: red;"> (*)</span></label>
                                    <input type="text" name="firstname" placeholder="Họ" class="form-control" required>
                                </section>
                            </div>
                            <div class="col-md-6 md-margin-bottom-50">
                                <section>
                                    <label class="input">Tên<span style="color: red;"> (*)</span></label>
                                    <input type="text" name="lastname" placeholder="Tên" class="form-control" required>
                                </section>
                            </div>
                        </div>
                        <section>
                            <label class="input">Địa chỉ email<span style="color: red;"> (*)</span></label>
                            <input type="email" name="email" placeholder="Địa chỉ email" class="form-control" required>
                        </section>
                        <div class="row">
                            <div class="col-md-6 md-margin-bottom-50">
                                <section>
                                    <label class="input">Mật khẩu<span style="color: red;"> (*)</span></label>
                                    <input type="password" name="password" placeholder="Mật khẩu" id="password" class="form-control" minlength="6" required>
                                </section>
                            </div>
                            <div class="col-md-6 md-margin-bottom-50">
                                <section>
                                    <label class="input">Nhập lại mật khẩu<span style="color: red;"> (*)</span></label>
                                    <input type="password" name="passwordConfirm" placeholder="Nhập lại mật khẩu" class="form-control" minlength="6" required>
                                </section>
                            </div>
                        </div>
                    </div>
                    <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Tạo tài khoản</button>
                </form>

                <div class="margin-bottom-20"></div>
                <p class="text-center">
                    Đã có tài khoản? <a href="<?= site_url() ?>auth/login">Đăng nhập</a>
                </p>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</div>
<!--=== End Register ===-->

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $("form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('auth/check_register') ?>",
                type: 'post',
                data: $(this).serialize(),
                success: function() {
                    location.reload();
                },
                error: function(data) {
                    const obj = JSON.parse(JSON.stringify(data));

                    $("#msg").removeClass('hidden');
                    $("#msg").html(obj.responseJSON.msg);
                }
            });
        });
    });
</script>