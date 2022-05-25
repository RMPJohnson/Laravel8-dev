@extends('layouts.app')
@section('title', 'Roles | Update')
@section('content')
    <div class="col-lg-8">
        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @method('patch')
            @csrf
        <div class="ibox">
            <div class="ibox-title">
                Edit role and manage permissions.
            </div>
            <div class="ibox-content">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $role->name }}"
                           type="text"
                           class="form-control"
                           name="name"
                           placeholder="Name" required>
                </div>

                <label for="permissions" class="form-label">Assign Permissions</label>

                <table class="table table-striped">
                    <thead>
                    <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="1%">Guard</th>
                    </thead>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox"
                                       name="permission[{{ $permission->name }}]"
                                       value="{{ $permission->name }}"
                                       class='permission'
                                    {{ in_array($permission->name, $rolePermissions)
                                        ? 'checked'
                                        : '' }}>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div class="ibox-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save changes</button>
                <a href="{{ route('roles.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>

            </div>
        </div>
        </form>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
