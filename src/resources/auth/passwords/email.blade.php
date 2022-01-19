@extends('layouts.master')
@section('title', 'User | Reset Password')
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
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="post">
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

                {{-- Send reset link button --}}
                <button type="submit" class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-share-square"></span>
                    {{ __('Send Password Reset Link') }}
                </button>

            </form>
        </div>

    </div>
@endsection