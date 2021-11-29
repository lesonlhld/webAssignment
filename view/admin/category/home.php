    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category Data Table
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">category</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-tools pull-left">
                                <a href="<?= site_url('admin/category/add') ?>"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add Category</button></a>
                                <button type="button" class="btn btn-default btn-sm" id="remove"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <table id="home_table" class="table table-bcategoryed table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px"><input type="checkbox" id="check-all"></th>
                                        <th>Category ID</th>
                                        <th>Category name</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="details">
                                    <?php
                                    //-- Content Rows
                                    if (count($data['category_list']) == 0) {
                                        echo "<tr><td colspan='10' style='text-align:center'>No data available in table</td><tr>";
                                    }
                                    foreach ($data['category_list'] as $category) {
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="check_item" class="check-list" value="<?= $category->id ?>">
                                            </td>
                                            <td><?= $category->category_id ?></a></td>
                                            
                                            <td><a href="<?= site_url('admin/category/view?id=' . $category->category_id); ?>"><?= $category->category_name ?> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?= site_url('admin/category/view?id=' . $category->category_id); ?>"><i class="fa fa-eye"></i>View</a></li>
                                        
                                                        <li><a href="<?= site_url('admin/category/edit?id=' . $category->category_id); ?>"><i class="fa fa-pencil"></i>Edit</a></li>
                                                        <li>
                                                            <a href="<?= site_url('admin/category/remove?id=' . $category->category_id); ?>" onclick="return confirm('Are you sure you want to remove?');">
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

                        <div class="box-footer clearfix">
                            <?php
                            if (isset($data['page'])) {
                                $page = $data['page'];
                                echo (count($data['category_list']) > 0) ? "<i>Showing " . (($page - 1) * 10 + 1) . " to " . (($page - 1) * 10 + count($data['category_list'])) . "</i>" : "";
                                echo '<ul class="pagination no-margin pull-right">';

                                if ($page > 1) {
                                    echo '
                      <li><a href="' . site_url("admin/category/index?page=1") . '">&laquo;</a></li>
                      <li><a href="' . site_url("admin/category/index?page=" . ($page - 1)) . '">&lsaquo;</a></li>';
                                }
                                if ($page == 1) {
                                    echo '<li class="active"><a href="' . site_url("admin/category/index?page=$page") . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li><a href="' . site_url("admin/category/index?page=" . ($page - 1)) . '">' . ($page - 1) . '</a></li>
                      <li class="active"><a href="' . site_url("admin/category/index?page=" . $page) . '">' . $page . '</a></li>';
                                }
                                if (count($data['category_list']) == LIMIT) {
                                    echo '<li><a href="' . site_url("admin/category/index?page=" . ($page + 1)) . '">' . ($page + 1) . '</a></li>';
                                    echo '
                      <li><a href="' . site_url("admin/category/index?page=" . ($page + 1)) . '">&rsaquo;</a></li>
                      <li><a href="' . site_url("admin/category/index?page=" . $data['end_page']) . '">&raquo;</a></li>
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
            $('#remove').click(function() {
                $data = get_checked();
                if ($data.length == 0) {
                    alert('Please tick the items you want to remove');
                } else {
                    var del = confirm('Are you sure you want to remove?');
                    if (del == true) {
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url('admin/category/remove'); ?>',
                            data: {
                                ids: $data
                            },
                            success: function(response) {
                                location.reload();
                            }
                        });
                    }
                }
            });
        });
    </script>