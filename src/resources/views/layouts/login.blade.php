<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body class="gray-bg">
    <div class="middle-box loginscreen animated fadeInDown">
            <div>
                @yield('content')
            </div>
    </div>


@section('scripts')
    <!-- Mainly scripts -->
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/popper.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('plugins/metisMenu/jquery.metisMenu.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('plugins/slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>

    <!-- Custom and plugin javascript -->
    <script src="{!! asset('js/inspinia.js') !!}" type="text/javascript"></script>
@show

</body>
</html>
