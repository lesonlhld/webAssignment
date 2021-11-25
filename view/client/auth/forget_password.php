<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Quên mật khẩu</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Login ===-->
<div class="form-input content-md">
    <div class="container">
        <div class="row_new">
            <div>
                <form id="" class="form-input-block" action="javascript:void(0)" method="post">
                    <h2>Quên mật khẩu</h2>
                    <div id="msg" class="text-center alert alert-danger hidden" style="border-radius: .5rem;"></div>

                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="Email" name="email" class="form-control" required>
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
            $("form > button").attr('disabled', true);
            $("form > button").html("Đang kiểm tra...");
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('auth/check_forget') ?>",
                type: 'post',
                data: $(this).serialize(),
                success: function(data) {
                    $("form > button").attr('disabled', false);
                    $("form > button").html("Xác nhận");

                    $("#msg").removeClass('alert-danger');
                    $("#msg").addClass('alert-success');
                    $("#msg").removeClass('hidden');
                    $("#msg").html(data.msg);
                },
                error: function(data) {
                    $("form > button").attr('disabled', false);
                    $("form > button").html("Xác nhận");

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