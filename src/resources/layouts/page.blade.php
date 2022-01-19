@extends('layouts.master')
@section('classes_body','hold-transition sidebar-mini layout-fixed')
@section('content')
    <!-- Main Sidebar && Navbar Container -->
    @include('layouts.common.sidebar')
    @include('layouts.common.navbar')
    <div class="content-wrapper ">
        <div class="content-header">
            <div class="container-fluid">
                @if (trim($__env->yieldContent('page_header')))
                    <h1>@yield('page_header')</h1>
                @endif
            </div>
        </div>
        <div class="content">
            @yield('page-content')
        </div>
    </div>
    <!-- footer -->
    @include('layouts.common.footer')
@endsection