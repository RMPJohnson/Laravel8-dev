@extends('layouts.app')
@section('content')
    <div class="col-lg-6">
        <form method="post" action="{{ route('user.change-password') }}">
            @csrf
        <div class="ibox ">
            <div class="ibox-title">Change Password</div>
            <div class="ibox-content">
                @if (session('error'))
                    <div class="alert alert-danger"> <i class="fa fa-warning"></i>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success"> <i class="fa fa-check"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"><i class="fa fa-warning"></i> {{ $error }} </div>
                    @endforeach
                @endif
                    <p>Change your password to improve your security. Please never share your password or any other secret informaiton.</p>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Old Password *</label>
                        <div class="col-lg-7">
                        {!! Form::password('old_password', array('placeholder' => 'Old Password','class' => 'form-control')) !!}
                        @if ($errors->has('old_password'))
                            <span class="text-danger text-left">{{ $errors->first('old_password') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Password *</label>
                        <div class="col-lg-7">
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Confirm Password *</label>
                        <div class="col-lg-7">
                            {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger text-left">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
            <div class="ibox-footer">
                <div class="form-group row text-right">
                    <div class="col-lg-offset-2 col-lg-12">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-lock"></i> Change password</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection
