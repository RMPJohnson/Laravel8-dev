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
            <form method="POST" action="{{ route('tag_login') }}">
                @csrf
                <div class="form-group row">
                    <label for="blue_tag" class="col-md-4 col-form-label text-md-right">{{ __('Tag ID') }}</label>

                    <div class="col-md-6">
                        <input id="blue_tag" type="text" class="form-control @error('blue_tag') is-invalid @enderror" name="blue_tag" required autofocus>

                        @error('blue_tag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $blue_tag }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer ">
            <p class="my-0">
                <a href="{{ route('login') }}">
                    {{ __('Switch to email Login') }}
                </a>
            </p>
        </div>
    </div>
@endsection
