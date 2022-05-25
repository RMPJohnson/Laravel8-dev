@extends('layouts.login')
@section('title', 'User | Forget Password')
@section('content')

            <div class="ibox">
                <div class="ibox-title">{{ __('Reset Password') }}</div>
                <div class="ibox-content">
                    <p>If you did not remember your password then please enter your email and get new password</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                <a href="{{route('login')}}" class="btn btn-success"><i class="fa fa-unlock"></i> Login Here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


@endsection
