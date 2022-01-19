<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- jQuery Form Validation -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Toastr -->
<script src={{ asset('plugins/toastr/toastr.min.js') }}></script>
<!-- Select2 -->
<script src={{ asset('plugins/select2/js/select2.full.min.js') }}></script>
<!-- Theme Adminlte -->
<script src="{{ asset('plugins/theme/js/adminlte.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<!-- Notify -->
<script src="{{ asset('plugins/notify/notify.js') }}"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- treeview -->
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
<!-- Calender View -->
<script src="{{ asset('plugins/fullcalendar-3.10.2/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-3.10.2/lib/moment.min.js') }}"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>-->
<script src="{{ asset('js/moment.min.js')}}"></script>
<script src="{{ asset('js/moment-timezone-with-data.js')}}"></script>
<script src="{{ asset('js/timezone.js')}}"></script>
<!-- Custom Scripts -->
@stack('custom-scripts')
