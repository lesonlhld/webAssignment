    <?php $customer = $data['customer'] ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Customer details
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Customer</li>
                <li class="active">View</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= isset($customer) ?  $customer->first_name : '' ?>" placeholder="Enter first name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= isset($customer) ?  $customer->last_name : '' ?>" placeholder="Enter last name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= isset($customer) ?  $customer->email : '' ?>" placeholder="Enter email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($customer) ?  $customer->phone : '' ?>" placeholder="Enter phone number" disabled>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" disabled>
                                    <option hidden>Enter Gender</option>
                                    <option value="MALE" <?= (isset($customer) && $customer->gender == "MALE") ? 'selected' : '' ?>>Male</option>
                                    <option value="FEMALE" <?= (isset($customer) && $customer->gender == "FEMALE") ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" disabled>
                                    <option hidden>Enter Status</option>
                                    <option value="1" <?= (isset($customer) && $customer->publish == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= (!isset($customer) || $customer->publish == 0) ? 'selected' : '' ?>>Lock</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= isset($customer) ?  $customer->address : '' ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="date" id="birthday" name="birthday" class="form-control" value="<?= isset($customer) ?  $customer->birth_date : '' ?>" max=<?= date('Y-m-d'); ?> disabled>
                            </div>
                            <div class="form-group">
                                <label for="image">Avatar</label>
                                <?php if (isset($customer->avatar) && $customer->avatar != null && $customer->avatar != "") { ?>
                                    <img src='<?= base_url("source/users/" . $customer->avatar) ?>' alt="Avatar" style="width:100%;">
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="<?= site_url('admin/customer'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                        </div>
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>