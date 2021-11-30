<?php $user = $data['user'] ?>
<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home"></i></a></li>
        <li class="active">Thông tin tài khoản</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Information ===-->
<div class="form-input content-sm margin-bottom-30">
    <div class="container bootstrap snippet">
        <form id="" action="javascript:void(0)" method="post" enctype="multipart/form-data">
            <div class="form-input-block">
                <div class="col-sm-4">
                    <div class="text-center margin-top-40">
                        <img id="avatar_image" src="<?= (isset($user) && $user->avatar != "") ? base_url("source/users/" . strval($user->avatar)) : base_url('assets/img/no-avatar.png') ?>" class="avatar img-square img-thumbnail" alt="avatar">
                        <h6>Thay đổi hình đại diện</h6>
                        <input type="file" name="avatar" placeholder="Choose image" onchange="reload_avatar(this);" class="text-center center-block file-upload">
                        <input type="text" name="old_avatar_file_name" value="<?= isset($user) ?  $user->avatar : '' ?>" placeholder="Old avatar file url" class="hidden">
                    </div>
                    <br>
                </div>
                <div class="col-sm-8">
                    <h2>Thông tin tài khoản</h2>
                    <div id="msg" class="text-center alert alert-danger hidden" style="border-radius: .5rem;"></div>

                    <div class="reg-input">
                        <section>
                            <label class="input">Địa chỉ email</label>
                            <input type="email" name="email" placeholder="Địa chỉ email" value="<?= isset($user) ?  $user->email : '' ?>" class="form-control" readonly required>
                        </section>
                        <div class="row">
                            <div class="col-sm-6 sm-margin-bottom-50">
                                <section>
                                    <label class="input">Họ<span style="color: red;"> (*)</span></label>
                                    <input type="text" name="firstname" placeholder="Họ" value="<?= isset($user) ?  $user->first_name : '' ?>" class="form-control" required>
                                </section>
                            </div>
                            <div class="col-sm-6 sm-margin-bottom-50">
                                <section>
                                    <label class="input">Tên<span style="color: red;"> (*)</span></label>
                                    <input type="text" name="lastname" placeholder="Tên" value="<?= isset($user) ?  $user->last_name : '' ?>" class="form-control" required>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 sm-margin-bottom-50">
                                <section>
                                    <label class="input">Giới tính<span style="color: red;"> (*)</span></label>
                                    <select name="gender" placeholder="Giới tính" class="form-control">
                                        <option value="MALE" <?= isset($user) ? ($user->gender=='MALE' ? 'selected' : '') : '' ?>>Nam</option>
                                        <option value="FEMALE" <?= isset($user) ? ($user->gender=='FEMALE' ? 'selected' : '') : '' ?>>Nữ</option>
                                    </select>
                                </section>
                            </div>
                            <div class="col-sm-6 sm-margin-bottom-50">
                                <section>
                                    <label class="input">Ngày sinh</label>
                                    <input type="date" name="birthday" max=<?= date('Y-m-d'); ?> value="<?= isset($user) ?  $user->birth_date : '' ?>" class="form-control">
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 sm-margin-bottom-50">
                                <section>
                                    <label class="input">Số điện thoại<span style="color: red;"> (*)</span></label>
                                    <input type="text" name="phone" value="<?= isset($user) ?  $user->phone : '' ?>" class="form-control">
                                </section>
                            </div>
                            <div class="col-sm-6 sm-margin-bottom-50">
                                <section>
                                    <label class="input">Địa chỉ<span style="color: red;"> (*)</span></label>
                                    <input type="text" name="address" value="<?= isset($user) ?  $user->address : '' ?>" class="form-control">
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class=col-sm-6>
                                <button class="btn-u btn-u-sea-shop" type="submit">
                                    <i class="glyphicon glyphicon-ok-sign"></i> Lưu lại
                                </button>
                                <button class="btn-u btn-brd btn-brd-hover btn-u-sea-shop" type="reset">
                                    <i class="glyphicon glyphicon-repeat"></i> Đặt lại
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
        </form>
    </div>
    <!--end container-->
</div>
<!--=== End Information ===-->

<script>
    function reload_avatar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar_image')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        $("form").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "<?= site_url('member/update_info') ?>",
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
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