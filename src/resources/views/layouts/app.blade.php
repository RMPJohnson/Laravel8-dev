<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/popper.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('plugins/metisMenu/jquery.metisMenu.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('plugins/slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>

    <!-- Custom and plugin javascript -->
    <script src="{!! asset('js/inspinia.js') !!}" type="text/javascript"></script>
    <!-- jQuery UI -->
    <script src="{!! asset('plugins/jquery-ui/jquery-ui.min.js') !!}"></script>


</head>
<body>
  <!-- Wrapper-->
  <div id="wrapper">
        <!-- Navigation -->
        @include('layouts.navigation')
        <!-- Page wraper -->
         <div id="page-wrapper" class="gray-bg">
            <!-- Page wrapper -->
            @include('layouts.topnavbar')
            <!-- Main view  -->
             <div class="row mt-3">
                @yield('content')
             </div>
            <!-- Footer -->
            @include('layouts.footer')
        </div>
        <!-- End page wrapper-->
    </div>
    <!-- End wrapper-->
@yield('scripts')

</body>
</html>
