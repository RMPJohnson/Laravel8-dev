@extends('layouts.app')
@section('title', 'Permission Management')
@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                Manage Permissions
                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right"> <i class="fa fa-plus"></i> Add permission</a>
            </div>
            <div class="ibox-content">
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Guard</th>
                        <th scope="col" width="1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-white btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

