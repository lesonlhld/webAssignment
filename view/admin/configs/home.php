<?php $configs = $data['configs'] ?? null ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Configs website
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Configs</li>
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
                    <form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="box-body">
                            <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="<?= isset($configs) ?  $configs->company_name : '' ?>" placeholder="Enter company name">
                            </div>
                            <div class="form-group">
                                <label for="site_name">Website Name</label>
                                <input type="text" class="form-control" id="site_name" name="site_name" value="<?= isset($configs) ?  $configs->site_name : '' ?>" placeholder="Enter website name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= isset($configs) ?  $configs->email : '' ?>" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($configs) ?  $configs->phone : '' ?>" placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= isset($configs) ?  $configs->address : '' ?>">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="maintenance_mode" value="1" <?= isset($configs) ?  ($configs->maintenance_mode == true ? "checked" : "") : "" ?> id="maintenance_mode">Maintenance mode
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= site_url('admin/dashboard'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>

                        </div>
                    </form>
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $("form").submit(function(e) {
            $("#msg").addClass('hidden');
            e.preventDefault();
            $.ajax({
                url: "<?= site_url("admin/configs/save") ?>",
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