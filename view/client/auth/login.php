<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Đăng nhập</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Login ===-->
<div class="form-input content-md">
    <div class="container">
        <div class="row_new">
            <div>
                <form id="" class="form-input-block" action="javascript:void(0)" method="post">
                    <h2>ĐĂNG NHẬP</h2>
                    <div id="msg" class="text-center alert alert-danger hidden" style="border-radius: .5rem;"></div>

                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="Email" name="email" class="form-control" required>
                            </div>
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Mật khẩu" name="password" class="form-control" required>
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

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $("form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('auth/check_login') ?>",
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