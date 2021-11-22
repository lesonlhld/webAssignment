    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                File Manager
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">File Manager</li>
            </ol>
        </section>
        <section class="content">
            <!-- <iframe class="w-100 vh-100" frameborder="0" src="<?php echo base_url('files/dialog.php'); ?>">
            </iframe> -->

            <iframe width="100%" frameborder="0" style="background-color:#fff" src="<?php echo base_url('filemanager/dialog.php'); ?>"></iframe>
        </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var body = $('html').height();
            var top = $('header').height();
            $('iframe').height(body - top * 3.75);
        });
    </script>