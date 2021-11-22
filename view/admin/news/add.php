    <?php $news = $data['news'] ?? null ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= isset($news) ? 'Edit news details' : 'Add new news' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>News</li>
                <li class="active"><?= isset($news) ? 'Edit' : 'Add' ?></li>
            </ol>
        </section>

        <section class="content">
            <!-- form start -->
            <form method="POST" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">General Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="msg" class="alert alert-danger hidden" style="border-radius: .5rem;"></div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= isset($news) ?  $news->title : '' ?>" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="short_content">Short content</label>
                                    <input type="text" class="form-control" id="short_content" name="short_content" placeholder="Enter short content" value="<?= isset($news) ?  $news->short_content : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" placeholder="Choose image">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="publish" value="1" <?= isset($news) ?  ($news->publish == 1 ? "checked" : "") : "" ?> id="publish">Published
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= site_url('admin/news'); ?>"><button type="button" class="btn btn-info">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->


                    <div class="col-sm-12 col-lg-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detail</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" rows="10" cols="80"><?= isset($news) ?  $news->content : '' ?>
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </form>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            CKEDITOR.replace('content', {
                filebrowserBrowseUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl: 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl: 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
            });
            $("form").submit(function(e) {
                $("#msg").addClass('hidden');
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url("admin/news/save") . (isset($news) ? "?id=" . $news->id : "") ?>",
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