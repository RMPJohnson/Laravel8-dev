@extends('layouts.master')
@section('title', 'User | Confirm Password')
@section('classes_body','lockscreen')
@section('inner_classes_body','lockscreen-wrapper')
@section('content')
    <div class="lockscreen-wrapper">

        {{-- Lockscreen logo --}}
        <div class="lockscreen-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo/logo.png') }}" height="50">
                <b>{{ __('FUNAI') }}</b>
            </a>
        </div>

        {{-- Lockscreen user name --}}
        <div class="lockscreen-name">
            {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}
        </div>

        {{-- Lockscreen item --}}
        <div class="lockscreen-item">

            <form method="POST" action="{{ route('password.confirm') }}"
                  class="lockscreen-credentials ml-0">
                @csrf
                <div class="input-group">
                    <input id="password" type="password" name="password" autocomplete="current-password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('Password') }}" required autofocus>
                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>

        {{-- Password error alert --}}
        @error('password')
        <div class="lockscreen-subitem text-center" role="alert">
            <b class="text-danger">{{ $message }}</b>
        </div>
        @enderror

        {{-- Help block --}}
        <div class="help-block text-center">
            {{ __('Please, confirm your password to continue.') }}
        </div>

        {{-- Additional links --}}
        <div class="text-center">
            <a href="{{ route('password.request') }}">
                {{ __('I forgot my password') }}
            </a>
        </div>

    </div>
@endsection
