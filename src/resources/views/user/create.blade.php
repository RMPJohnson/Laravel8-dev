@extends('layouts.app')
@section('title', 'User | Create')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Add new user
            </div>
            <div class="ibox-content">
                <div class="body-small">
                    Add new user and assign role.
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            <div class="mb-3 ">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}"
                                       type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Name" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ old('email') }}"
                                       type="email"
                                       class="form-control"
                                       name="email"
                                       placeholder="Email address" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Create User</button>
                            <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                        </form>
                    </div>
                </div>


            </div>
        </div>

@endsection
