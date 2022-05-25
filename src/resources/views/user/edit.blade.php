@extends('layouts.app')
@section('title', 'User | Update')
@section('content')
    <div class="col-lg-12">
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="ibox">
                <div class="ibox-title">
                    Update user
                </div>
                <div class="ibox-content">
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <input value="{{ $user->profile->first_name }}"
                                           type="text"
                                           class="form-control"
                                           name="first_name"
                                           placeholder="First Name" required>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Last Name</label>
                                    <input value="{{ $user->profile->last_name }}"
                                           type="text"
                                           class="form-control"
                                           name="last_name"
                                           placeholder="Last Name" required>
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ $user->name }}"
                                           type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="Name" readonly disabled>

                                    @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input value="{{ $user->email }}"
                                           type="email"
                                           class="form-control"
                                           name="email"
                                           placeholder="Email address" readonly disabled >
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-control"
                                            name="role" required>
                                        <option value="">Select role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ in_array($role->name, $userRole)
                                                    ? 'selected'
                                                    : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address</label>
                                    <input value="{{ $user->profile->address }}"
                                           type="text"
                                           class="form-control"
                                           name="address"
                                           placeholder="Address" required>
                                    @if ($errors->has('address'))
                                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"><div class="mb-3">
                                            <label for="name" class="form-label">City</label>
                                            <input value="{{ $user->profile->city }}"
                                                   type="text"
                                                   class="form-control"
                                                   name="city"
                                                   placeholder="City" required>
                                            @if ($errors->has('address'))
                                                <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div></div>
                                    <div class="col-lg-6"><div class="mb-3">
                                            <label for="name" class="form-label">State</label>
                                            <input value="{{ $user->profile->state }}"
                                                   type="text"
                                                   class="form-control"
                                                   name="state"
                                                   placeholder="State" required>
                                            @if ($errors->has('state'))
                                                <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div></div>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Phone No</label>
                                    <input value="{{ $user->profile->phone_no }}"
                                           type="text"
                                           class="form-control"
                                           name="phone_no"
                                           placeholder="Phone No" required>
                                    @if ($errors->has('phone_no'))
                                        <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="name" class="form-label">Upload Picture</label>
                                        {!! Form::file('picture' , array('placeholder' => 'Upload Picture','class' => 'form-control')) !!}
                                        {!! Form::hidden('old_image' ,$user->profile->picture, array('class' => 'form-control')) !!}
                                        <divs class="text-warning">Image size should 100X200 px, .jpg,.png,.gif,.svg are allowed and size must be less then 2 MB</divs>
                                        @if ($errors->has('picture'))
                                            <span class="text-danger text-left">{{ $errors->first('picture') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="profile-image"
                                            @isset($user->profile->picture)
                                            <img src="{!! asset('images/user/'. $user->profile->picture) !!}" class="img-fluid img-circle">
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="ibox-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Update user</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </form>
    </div>

@endsection
