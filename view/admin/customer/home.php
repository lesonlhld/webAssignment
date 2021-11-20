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
                                <!-- <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?php echo site_url('Customers/spreadsheet_export'); ?>'"><i class="fa fa-download"></i> Export to excel</button>
                                <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?php echo site_url('Customers/pdf_export'); ?>'"><i class="fa fa-download"></i> Export to PDF</button> -->
                                <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?php echo site_url('Customers/add'); ?>'"><i class="fa fa-plus"></i> Add item</button>
                                <a href="<?php echo site_url('Customers/delAll'); ?>"><button type="button" class="btn btn-default btn-sm" onclick="return confirm('Are you sure you want to delete DATA ?');"><i class="fa fa-trash"></i> Delete</button></a>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Phone Number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php
                                                if (isset($list)) {
                                                    $stt = 0;
                                                    foreach ($list as $item) {
                                                        $stt++;
                                                        echo "<tr>";
                                                        echo "<td class='sorting_1'>$item[id]</td>";
                                                        echo "<td>$item[name]</td>";
                                                        echo "<td>$item[email]</td>";
                                                        echo "<td>$item[phone]</td>";
                                                        echo "<td>
                          <div class='btn-group'>
                            <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>Actions
                              <span class='fa fa-caret-down'></span>
                            </button>
                            <ul class='dropdown-menu' role='menu'>";
                                                        echo '<li><a href="' . site_url('Customers/view/' .  $item['id']) . '"> View </a></li>';
                                                        echo '<li><a href="' . site_url('Customers/edit_thread/' .  $item['id']) . '"> Edit </a></li>';
                                                        echo '<li><a href="' . site_url('Customers/delete/' .  $item['id']) . '" onclick="return confirm(\'Are you sure you want to delete?\');">Delete</a></li>';
                                                        echo "</ul>
                          </div>
                                              
                          </td>

                
                          
                      </tr>";
                                                    }
                                                }
                                                ?>


                                                <tr role="row" class="even">
                                                    <td class="sorting_1">2</td>
                                                    <td>Nguyen Duy Kien</td>
                                                    <td>ABC@gmail.com</td>
                                                    <td>Male</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="php echo site_url('Customers/view'); ">View</a></li>
                                                                <li><a href="php echo site_url('Customers/edit'); ?>">Edit</a></li>
                                                                <li><a href="#">Delete</a></li>
                                                            </ul>
                                                        </div>


                                                    </td>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>