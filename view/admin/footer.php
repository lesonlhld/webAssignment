<!-- Footer -->
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
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
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/adminlte/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/plugins/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/plugins/adminlte/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/plugins/adminlte/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/plugins/adminlte/dist/js/demo.js') ?>"></script>
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