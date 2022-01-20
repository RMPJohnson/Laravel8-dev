@extends('layouts.app')
@section('title', 'User | Show')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Update user
            </div>
            <div class="ibox-content">
                <div class="container mt-4">
                    <div>
                        Name: {{ $user->name }}
                    </div>
                    <div>
                        Email: {{ $user->email }}
                    </div>
                    <div>
                        Username: {{ $user->username }}
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
