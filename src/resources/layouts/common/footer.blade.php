<footer class="main-footer text-center">
    <strong>&copy; 2020 Copyright: </strong><a target="_blank" href="https://funaiservicecorp.com/">Funai Service Corporation</a>.
</footer>
@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let message = '{{ \Illuminate\Support\Facades\Session::get('message') }}';
            let type = '{{ \Illuminate\Support\Facades\Session::get('alert-class') }}';
            show_toastr(message,type);
        });
        function show_toastr(message, type) {
            if(message !== '') {
                switch(type) {
                    case 'alert-success':
                        toastr.success(message, {showDuration: 500, timeOut: 500});
                        break;
                    case 'alert-error':
                        toastr.error(message, {showDuration: 3000, timeOut: 3000});
                        break;
                    case 'alert-danger':
                        toastr.warning(message, {showDuration: 1000, timeOut: 1000});
                        break;
                    default:
                        toastr.info(message, {showDuration: 1000, timeOut: 1000});
                }
            }
        }
    </script>
@endpush