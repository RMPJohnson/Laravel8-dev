@extends('layouts.master')
@section('title', 'User | Forget Password')
@section('classes_body','login-page')
@section('inner_classes_body','login-box')
@section('content')
    @include('layouts.common.auth_logo')
    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title float-none text-center">
                {{ ('Reset Password') }}
            </h3>
        </div>

        <div class="card-body login-card-body">
            <form action="{{ route('password.update') }}" method="post">
                {{ csrf_field() }}

                {{-- Token field --}}
                <input type="hidden" name="token" value="{{ $token }}">

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
                    <input type="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
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

                {{-- Password confirmation field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                           class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                           placeholder="{{ __('Retype password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- Confirm password reset button --}}
                <button type="submit" class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-sync-alt"></span>
                    {{ __('Reset Password') }}
                </button>

            </form>
        </div>

    </div>
@endsection