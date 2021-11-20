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
        <form class="form" action="${myaccount}" method="post" id="registrationForm" enctype="multipart/form-data">
            <!--left col-->
            <div class="col-sm-3">
                <input name="role" value="${sessionScope.account.roleId}" hidden="">
                <input name="id" value="${sessionScope.account.id}" hidden="">
                <div class="text-center">
                    <img src="#" class="avatar img-square img-thumbnail" alt="avatar">
                    <h6>Thay đổi hình đại diện</h6>
                    <input type="file" name="avatar" class="text-center center-block file-upload">
                </div>
                <br>
            </div>
            <!--col-3-->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="form-group">
                            <h4 style="color: red;"> ${alertMsg}</h4>
                            <div class="col-xs-6">
                                <label for="firstname">
                                    <h4>Họ:</h4>
                                </label> <input type="text" class="form-control" name="firstname" id="firstname" value="" title="enter your first name if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="lastname">
                                    <h4>Tên:</h4>
                                </label> <input type="text" class="form-control" name="lastname" id="lastname" value="" title="enter your first name if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="birthday">
                                    <h4>Ngày sinh:</h4>
                                </label> <input type="date" class="form-control" name="birthday" id="birthday" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="gender">
                                    <h4>Giới tính:</h4>
                                </label>
                                <div class="checkbox">
                                    <label> <input type="radio" value="M" name="gender" />Nam </label>
                                    <label> <input type="radio" value="F" name="gender" checked="checked" />Nữ </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email:</h4>
                                </label> <input type="text" class="form-control" name="email" id="email" value="" title="enter your first name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Số điện thoại:</h4>
                                </label> <input type="text" class="form-control" name="phone" id="phone" value="" title="enter your first name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="address">
                                    <h4>Địa chỉ:</h4>
                                </label> <input type="text" class="form-control" name="address" id="address" value="" title="enter your first name if any.">
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