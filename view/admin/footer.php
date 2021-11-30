<!-- Footer -->
<!-- /.content-wrapper -->
<footer class="main-footer">
    BK Food Court
</footer>
<!-- /.footer -->

</div>
<!-- ./wrapper -->

<!-- JS -->
</script>
<!-- jQuery 3 -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/plugins/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/plugins/adminlte/dist/js/adminlte.min.js') ?>"></script>
<!-- CK Editor -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/ckeditor/ckeditor.js') ?>"></script>

<!-- page script -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $("#check-all").click(function() {
            $(".check-list").prop('checked', $(this).prop('checked'));
        });
    });
</script>
<!-- /.JS -->
</body>

</html>