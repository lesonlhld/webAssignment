<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Đăng ký</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Register ===-->
<div class="log-reg content-md margin-bottom-30">
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
                            <span>10+</span> <small>Thương hiệu</small>
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
                <form id="" class="log-reg-block" action="register" method="post">
                    <h2>Đăng ký tài khoản</h2>
                    <h3 style="color: red;"> ${alertMsg}</h3>

                    <div class="login-input reg-input">
                        <div class="row">
                            <div class="col-md-6 md-margin-bottom-50">
                                <section>
                                    <label class="input"> <input type="text" name="firstname" placeholder="Họ" class="form-control">
                                    </label>
                                </section>
                            </div>
                            <div class="col-md-6 md-margin-bottom-50">
                                <section>
                                    <label class="input"> <input type="text" name="lastname" placeholder="Tên" class="form-control">
                                    </label>
                                </section>
                            </div>
                        </div>
                        <section>
                            <label class="input"> <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control">
                            </label>
                        </section>
                        <section>
                            <label class="input"> <input type="email" name="email" placeholder="Địa chỉ Email" class="form-control">
                            </label>
                        </section>
                        <section>
                            <label class="input"> <input type="password" name="password" placeholder="Mật khẩu" id="password" class="form-control">
                            </label>
                        </section>
                        <section>
                            <label class="input"> <input type="password" name="passwordConfirm" placeholder="Nhập lại mật khẩu" class="form-control">
                            </label>
                        </section>
                        <section>
                            <label class="input">Giới tính</label>
                            <input type="radio" value="M" name="gender" /> Nam
                            <input type="radio" value="F" name="gender" /> Nữ
                        </section>
                        <section>
                            <label>Ngày tháng năm sinh</label><br>
                            <label class="input"> <input type="date" name="birthday" class="form-control">
                            </label>
                        </section>
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
