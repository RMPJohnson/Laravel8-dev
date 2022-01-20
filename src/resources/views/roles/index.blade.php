@extends('layouts.app')
@section('title', 'Roles Management')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Manage Roles
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right"> <i class="fa fa-plus"></i> Add role</a>
            </div>
            <div class="ibox-content">
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th width="80%">Name</th>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('roles.show', $role->id) }}"><i class="fa fa-street-view"></i> Show</a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex">
                    {!! $roles->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
