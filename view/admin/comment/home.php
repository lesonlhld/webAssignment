    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Comment Data Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Comment</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-tools pull-left">
                                <!-- <a href=""><button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add comment</button></a> -->
                                <!-- <button type="button" class="btn btn-default btn-sm" id="remove"><i class="fa fa-trash"></i> Remove</button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <table id="home_table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px"><input type="checkbox" id="check-all"></th>
                                        <th>Comment ID</th>
                                        <th>Rate</th>
                                        <th>Content</th>
                                        <th>Created at</th>
                                        <th>Created by</th>
                                        <th>Product</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['comment_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table</td><tr>";
                                    }
                                    foreach ($data['comment_list'] as $comment) {
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_item" class="check-list" value="<?= $comment->id ?>">
                                            </td>
                                            <td><a href="<?= site_url('admin/comment/view?id=' . $comment->comment_id); ?>"><?= $comment->comment_id ?></a> </td>
                                            <td><?= $comment->comment_rate ?> </td>
                                            <td><?= $comment->comment ?> </td>
                                            <td><?= $comment->create_at ?> </td>
                                            <td><?= $comment->first_name . $comment->last_name ?> </td>
                                            <td><?= $comment->product_name ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?= site_url('admin/comment/view?id=' . $comment->comment_id); ?>"><i class="fa fa-eye"></i>View</a></li>
                                                        <li><a href="<?= site_url('admin/comment/edit?id=' . $comment->comment_id); ?>"><i class="fa fa-eye"></i>Edit</a></li>
                                                        <li><a href="<?= site_url('admin/comment/delete?id=' . $comment->comment_id); ?>"><i class="fa fa-eye"></i>Delete</a></li>
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
                                echo (count($data['comment_list']) > 0) ? "<i>Showing " . (($page - 1) * 10 + 1) . " to " . (($page - 1) * 10 + count($data['comment_list'])) . "</i>" : "";
                                echo '<ul class="pagination no-margin pull-right">';

                                if ($page > 1) {
                                    echo '
                      <li><a href="' . site_url("admin/comment/index?page=1") . '">&laquo;</a></li>
                      <li><a href="' . site_url("admin/comment/index?page=" . ($page - 1)) . '">&lsaquo;</a></li>';
                                }
                                if ($page == 1) {
                                    echo '<li class="active"><a href="' . site_url("admin/comment/index?page=$page") . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li><a href="' . site_url("admin/comment/index?page=" . ($page - 1)) . '">' . ($page - 1) . '</a></li>
                      <li class="active"><a href="' . site_url("admin/comment/index?page=" . $page) . '">' . $page . '</a></li>';
                                }
                                if (count($data['comment_list']) == LIMIT) {
                                    echo '<li><a href="' . site_url("admin/comment/index?page=" . ($page + 1)) . '">' . ($page + 1) . '</a></li>';
                                    echo '
                      <li><a href="' . site_url("admin/comment/index?page=" . ($page + 1)) . '">&rsaquo;</a></li>
                      <li><a href="' . site_url("admin/comment/index?page=" . $data['end_page']) . '">&raquo;</a></li>
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
    </script>