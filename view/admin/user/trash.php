    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Trash Data Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-tools pull-left">
                                <button type="button" class="btn btn-default btn-sm" id="restore"><i class="fa fa-undo"></i> Restore</button>
                                <button type="button" class="btn btn-default btn-sm" id="delete"><i class="fa fa-trash"></i> Delete Permanently</button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <table id="home_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px"><input type="checkbox" id="check-all"></th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['user_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table</td><tr>";
                                    }
                                    foreach ($data['user_list'] as $user) {
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_item" class="check-list" value="<?= $user->id ?>">
                                            </td>
                                            <td><a href="<?= site_url('admin/user/view?id=' . $user->id); ?>"><?= $user->first_name . " " . $user->last_name ?></a> </td>
                                            <td><?= $user->phone ?> </td>
                                            <td><?= $user->email ?> </td>
                                            <td>
                                                <?= $user->publish == 1 ?
                                                    '<label class="label label-success">Active </label>' : '<label class="label label-warning">Locked </label>'
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?= site_url('admin/user/restore?id=' . $user->id) ?>"><i class="fa fa-undo"></i>Restore</a></li>
                                                        <li><a href="<?= site_url('admin/user/delete_permanently?id=' . $user->id) ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i>Delete</a></li>
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

                        <div class="box-footer clearfix">
                            <?php
                            if (isset($data['page'])) {
                                $page = $data['page'];
                                echo (count($data['user_list']) > 0) ? "<i>Showing " . (($page - 1) * 10 + 1) . " to " . (($page - 1) * 10 + count($data['user_list'])) . "</i>" : "";
                                echo '<ul class="pagination no-margin pull-right">';

                                if ($page > 1) {
                                    echo '
                      <li><a href="' . site_url("admin/user/trash?page=1") . '">&laquo;</a></li>
                      <li><a href="' . site_url("admin/user/trash?page=" . ($page - 1)) . '">&lsaquo;</a></li>';
                                }
                                if ($page == 1) {
                                    echo '<li class="active"><a href="' . site_url("admin/user/trash?page=$page") . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li><a href="' . site_url("admin/user/trash?page=" . ($page - 1)) . '">' . ($page - 1) . '</a></li>
                      <li class="active"><a href="' . site_url("admin/user/trash?page=" . $page) . '">' . $page . '</a></li>';
                                }
                                if (count($data['user_list']) == LIMIT) {
                                    echo '<li><a href="' . site_url("admin/user/trash?page=" . ($page + 1)) . '">' . ($page + 1) . '</a></li>';
                                    echo '
                      <li><a href="' . site_url("admin/user/trash?page=" . ($page + 1)) . '">&rsaquo;</a></li>
                      <li><a href="' . site_url("admin/user/trash?page=" . $data['end_page']) . '">&raquo;</a></li>
                      </ul>';
                                }
                            }
                            ?>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function(event) {
                                $('li').click(function() {
                                    $(this).addClass('active').siblings().removeClass('active');
                                });
                            });
                        </script>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>

    <script>
        function get_checked() {
            var rows = $('#details tr');
            var a = [];
            rows.each(function() {
                if ($(this).find('#check_item').is(':checked')) {
                    var id = $(this).find('#check_item').val();
                    a.push(id);
                }
            });
            return a;
        }
        document.addEventListener("DOMContentLoaded", function(event) {
            $('#restore').click(function() {
                $data = get_checked();
                if ($data.length == 0) {
                    alert('Please tick the items you want to restore');
                } else {
                    var del = confirm('Are you sure you want to restore?');
                    if (del == true) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('admin/user/restore'); ?>',
                            data: {
                                ids: $data
                            },
                            success: function(response) {
                                // console.log(response);
                                location.reload();
                            }
                        });
                    }
                }
            });
            $('#delete').click(function() {
                $data = get_checked();
                if ($data.length == 0) {
                    alert('Please tick the items you want to delete');
                } else {
                    var del = confirm('Are you sure you want to delete?');
                    if (del == true) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('admin/user/delete_permanently'); ?>',
                            data: {
                                ids: $data
                            },
                            success: function(response) {
                                // console.log(response);
                                location.reload();
                            }
                        });
                    }
                }
            });
        });
    </script>