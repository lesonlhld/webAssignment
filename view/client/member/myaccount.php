<?php $user = $data['user'] ?>
<!-- Breadcrumbs v5 -->
<div class="container">
    <ul class="breadcrumb-v5">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li class="active">Thông tin tài khoản</li>
    </ul>
</div>
<!-- End Breadcrumbs v5 -->

<!--=== Information ===-->
<div class="form-input content-md margin-bottom-30">
    <div class="container bootstrap snippet">
        <form class="form" action="javascript.void(0)" method="post" id="" enctype="multipart/form-data">
            <!--left col-->
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="#" class="avatar img-square img-thumbnail" alt="avatar">
                    <h6>Thay đổi hình đại diện</h6>
                    <input type="file" name="image" class="text-center center-block file-upload">
                </div>
                <br>
            </div>
            <!--col-3-->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="firstname">
                                    <h4>Họ:</h4>
                                </label> <input type="text" class="form-control" name="firstname" id="firstname" value="<?= isset($user) ?  $user->first_name : '' ?>" placeholder="Enter your first name.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="lastname">
                                    <h4>Tên:</h4>
                                </label> <input type="text" class="form-control" name="lastname" id="lastname" value="<?= isset($user) ?  $user->last_name : '' ?>" placeholder="Enter your last name.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="birthday">
                                    <h4>Ngày sinh:</h4>
                                </label> <input type="date" class="form-control" name="birthday" id="birthday" value="<?= isset($user) ?  $user->birth_date : '' ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="gender">
                                    <h4>Giới tính:</h4>
                                </label>
                                <select name="gender" id="" class="form-control">
                                    <option value="MALE">Nam</option>
                                    <option value="FEMALE">Nữ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email:</h4>
                                </label> <input type="text" class="form-control" name="email" id="email" value="<?= isset($user) ?  $user->email : '' ?>" placeholder="Enter your email.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Số điện thoại:</h4>
                                </label> <input type="text" class="form-control" name="phone" id="phone" value="<?= isset($user) ?  $user->phone : '' ?>" placeholder="Enter your phone.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="address">
                                    <h4>Địa chỉ:</h4>
                                </label> <input type="text" class="form-control" name="address" id="address" value="<?= isset($user) ?  $user->address : '' ?>" placeholder="Enter your address.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit">
                                    <i class="glyphicon glyphicon-ok-sign"></i> Lưu lại
                                </button>
                                <button class="btn btn-lg" type="reset">
                                    <i class="glyphicon glyphicon-repeat"></i> Đặt lại
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end container-->
</div>
<!--=== End Information ===-->

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $("form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('member/update_info') ?>",
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