<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Đăng nhập</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Login ===-->
<div class="log-reg-v3 content-md">
    <div class="container">
        <div class="row_new">
            <div>
                <form id="" class="log-reg-block" action="login" method="post">
                    <h2>ĐĂNG NHẬP</h2>
                    <h3 style="color: red;"> ${alertMsg}</h3>

                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" placeholder="Tên đăng nhập" name="username" class="form-control">
                            </div>
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Mật khẩu" name="password" class="form-control">
                            </div>
                        </label>
                    </section>
                    <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Đăng nhập</button>
                </form>

                <div class="margin-bottom-20"></div>
                <p class="text-center">
                    Chưa có tài khoản? <a href="<?= site_url() ?>auth/register">Đăng ký</a>
                </p>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</div>
<!--=== End Login ===-->