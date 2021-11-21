    <?php $customer = $data['customer'] ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= isset($customer) ? 'Edit customer details' : 'Add new customer' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">customer</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="<?= isset($customer) ? site_url() . "admin/customer/edit/" . $customer->id : site_url() . "admin/customer/add" ?>" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= isset($customer) ?  $customer->name : '' ?>" placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= isset($customer) ?  $customer->name : '' ?>" placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= isset($customer) ?  $customer->email : '' ?>" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($customer) ?  $customer->phone : '' ?>" placeholder="Enter phone number">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option hidden>Enter Gender</option>
                                        <option value="1" <?= (isset($customer) && $customer->gender == 1) ? 'selected' : '' ?>>Male</option>
                                        <option value="0" <?= (!isset($customer) || $customer->gender == 0) ? 'selected' : '' ?>>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option hidden>Enter Status</option>
                                        <option value="1" <?= (isset($customer) && $customer->status == 1) ? 'selected' : '' ?>>Status 1</option>
                                        <option value="0" <?= (!isset($customer) || $customer->status == 0) ? 'selected' : '' ?>>Status 0</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= isset($customer) ?  $customer->address : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" id="birthday" name="birthday" class="form-control" value="<?= isset($customer) ?  $customer->birthday : '' ?>" max=<?= date('Y-m-d'); ?>>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Avatar</label>
                                    <input type="file" id="exampleInputFile" name="avatar" placeholder="Choose image">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= site_url('admin/customer'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>