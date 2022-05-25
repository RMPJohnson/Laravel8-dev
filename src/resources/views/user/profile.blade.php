@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                User Profile
            </div>
            <div class="ibox-content">
                <div class="container mt-4">
                    <div class="col-md-8">
                        <div class="profile-image">
                            @isset($user->profile->picture)
                                <img src="{!! asset('images/user/'. $user->profile->picture) !!}" class="img-fluid img-circle">
                            @endisset
                        </div>
                        <div class="profile-info">
                            <h4>
                                <div class="row">
                                    <div class="col-lg-4"><dt>User Name:</dt></div>
                                    <div class="col-lg-8">{{ $user->name }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>Email Address:</dt></div>
                                    <div class="col-lg-8">{{ $user->email }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>First Name:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->first_name }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>Last Name:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->last_name }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>Address:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->address }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>City:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->city }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>State:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->state }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>Phone no:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->phone_no }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>Created At:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->created_at }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4"><dt>Updated At:</dt></div>
                                    <div class="col-lg-8">{{ $user->profile->updated_at }}</div>
                                </div>
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="ibox-footer">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="fa fa-pencil-square"></i> Edit User</a>
                    <a href="{{ route('users.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

@endsection
