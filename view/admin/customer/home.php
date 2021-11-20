    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Customer Data Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Customer</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-tools pull-left">
                                <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?php echo site_url('Customers/add'); ?>'"><i class="fa fa-plus"></i> Add item</button>
                                <a href="<?php echo site_url('Customers/delAll'); ?>"><button type="button" class="btn btn-default btn-sm" onclick="return confirm('Are you sure you want to delete DATA ?');"><i class="fa fa-trash"></i> Delete</button></a>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <table id="home_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px"><input type="checkbox" id="check-all"></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['user_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table<td><tr>";
                                    }
                                    foreach ($data['user_list'] as $user) {
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_item" class="check-list" value="<?= $user->id ?>">
                                            </td>
                                            <td><?= $user->id ?> </td>
                                            <td><?= $user->first_name . " " . $user->last_name ?> </td>
                                            <td><?= $user->gender ?> </td>
                                            <td><?= $user->phone ?> </td>
                                            <td><?= $user->email ?> </td>
                                            <td><?= $user->address ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#"><i class="fa fa-eye"></i>View</a></li>
                                                        <li><a href="#"><i class="fa fa-refresh"></i>Lock</a></li>
                                                        <li><a href="#"><i class="fa fa-pencil"></i>Edit</a></li>
                                                        <li>
                                                            <a href="#" onclick="return confirm('Are you sure you want to remove?');">
                                                                <i class="fa fa-trash"></i>Remove</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>