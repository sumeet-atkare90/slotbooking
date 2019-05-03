<footer class="main-footer">

</footer>


<!-- jQuery 3 -->
<script src="{{ URL::to('portal/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::to('portal/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::to('portal/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- daterangepicker -->
<script src="{{ URL::to('portal/bower_components/moment/min/moment.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ URL::to('portal/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::to('portal/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('portal/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::to('portal/dist/js/demo.js') }}"></script>

<!-- iCheck -->
<script src="{{ URL::to('portal/plugins/iCheck/icheck.min.js') }}"></script>

</body>

</html>