<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HR-BLOCK | @yield('title')</title>

    @include('layouts.common.links')

</head>
<body class="@yield('classes_body')">

    @if (trim($__env->yieldContent('inner_classes_body')))
        <div class="@yield('inner_classes_body')">
            @endif
            <div class="wrapper">
                <!-- Content -->
                @yield('content')
            </div>
            @if (trim($__env->yieldContent('inner_classes_body')))
        </div>
    @endif
    @include('layouts.common.scripts')

</body>
</html>
