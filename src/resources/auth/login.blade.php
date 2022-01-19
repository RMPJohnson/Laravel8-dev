@extends('layouts.master')
@section('title', 'User | Login')
@section('classes_body','login-page')
@section('inner_classes_body','login-box')
@section('content')
    @include('layouts.common.auth_logo')
    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title float-none text-center">
                {{ __('Sign in to start your session') }}
            </h3>
        </div>

        <div class="card-body login-card-body ">
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="{{ __('Email') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="{{ __('Password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Login field --}}
                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                            <span class="fas fa-sign-in-alt"></span>
                            {{ __('Sign In') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <div class="card-footer ">
            <p class="my-0">
                <a href="{{ route('password.request') }}">
                    {{ __('I forgot my password') }}
                </a>
            </p>
            <p class="my-0">
                <a href="{{ route('register') }}">
                    {{ __('Register a new membership') }}
                </a>
            </p>
        </div>

    </div>
@endsection
