<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Tạo mật khẩu</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Login ===-->
<div class="form-input content-md">
    <div class="container">
        <div class="row_new">
            <div>
                <form id="" class="form-input-block" action="javascript:void(0)" method="post">
                    <h2>Tạo mật khẩu</h2>
                    <div id="msg" class="text-center alert alert-danger <?= (isset($data['msg']) && $data['msg'] != "") ? "" : "hidden" ?>" style="border-radius: .5rem;"><?= $data['msg'] ?? "" ?></div>

                    <input type="text" name="email" class="hidden" value="<?= $data['email'] ?? "" ?>">
                    <input type="text" name="reset_token" class="hidden" value="<?= $data['reset_token'] ?? "" ?>">
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Mật khẩu" name="password" class="form-control" required>
                            </div>
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" placeholder="Mật khẩu xác nhận" name="passwordConfirm" class="form-control" required>
                            </div>
                        </label>
                    </section>
                    <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Xác nhận</button>
                </form>

                <div class="margin-bottom-20"></div>
                <p class="text-center">
                    <a href="<?= site_url() ?>auth/login">Đăng nhập</a>
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
                url: "<?= site_url('auth/update_password') ?>",
                type: 'post',
                data: $(this).serialize(),
                success: function(data) {
                    $("#msg").removeClass('alert-danger');
                    $("#msg").addClass('alert-success');
                    $("#msg").removeClass('hidden');
                    $("#msg").html(data.msg);
                },
                error: function(data) {
                    const obj = JSON.parse(JSON.stringify(data));

                    $("#msg").removeClass('alert-success');
                    $("#msg").addClass('alert-danger');
                    $("#msg").removeClass('hidden');
                    $("#msg").html(obj.responseJSON.msg);
                }
            });
        });
    });
</script>