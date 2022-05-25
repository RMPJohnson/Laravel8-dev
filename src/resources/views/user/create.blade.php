@extends('layouts.app')
@section('title', 'User | Create')
@section('content')

    <div class="col-lg-12 col-md-12">
    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="ibox">
            <div class="ibox-title">
                Create User
            </div>
            <div class="ibox-content">
                <div class="text-danger"> * fields are required</div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">First Name *</label>
                            {!! Form::text('first_name', old('first_name'), array('placeholder' => 'First Name','class' => 'form-control')) !!}
                            @if ($errors->has('first_name'))
                                <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Last Name *</label>
                            {!! Form::text('last_name', old('last_name'), array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                            @if ($errors->has('last_name'))
                                <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name *</label>
                            {!! Form::text('name', old('name'), array('placeholder' => 'User Name','class' => 'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            {!! Form::text('email', old('email'), array('placeholder' => 'Email Address','class' => 'form-control')) !!}
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role *</label>
                            {!! Form::select('role', $roles, old('role'),array('empty' => 'Select Role','class' => 'form-control')) !!}
                            @if ($errors->has('role'))
                                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Address *</label>
                            {!! Form::text('address', old('address'), array('placeholder' => 'Address','class' => 'form-control')) !!}
                            @if ($errors->has('address'))
                                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><div class="mb-3">
                                    <label for="name" class="form-label">City *</label>
                                    {!! Form::text('city', old('city'), array('placeholder' => 'City','class' => 'form-control')) !!}
                                    @if ($errors->has('city'))
                                        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                                    @endif
                                </div></div>
                            <div class="col-lg-6"><div class="mb-3">
                                    <label for="name" class="form-label">State *</label>
                                    {!! Form::text('state', old('state'), array('placeholder' => 'State','class' => 'form-control')) !!}
                                    @if ($errors->has('state'))
                                        <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name" class="form-label">Phone No *</label>
                                {!! Form::text('phone_no', old('phone_no'), array('placeholder' => 'Phone No','class' => 'form-control')) !!}
                                @if ($errors->has('phone_no'))
                                    <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="form-label">Upload Picture *</label>
                                {!! Form::file('picture' , array('placeholder' => 'Upload Picture','class' => 'form-control')) !!}
                                <div class="text-warning">Image size should 100X200 px, .jpg,.png,.gif,.svg are allowed and size must be less then 2 MB</div>
                                @if ($errors->has('picture'))
                                    <span class="text-danger text-left">{{ $errors->first('picture') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><div class="mb-3">
                                    <label for="name" class="form-label">Password *</label>
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    @if ($errors->has('city'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div></div>
                            <div class="col-lg-6"><div class="mb-3">
                                    <label for="name" class="form-label">Confirm Password *</label>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                    @if ($errors->has('state'))
                                        <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save User</button>
                <a href="{{ route('users.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </form>
    </div>

@endsection
