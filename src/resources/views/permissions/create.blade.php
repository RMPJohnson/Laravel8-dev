@extends('layouts.app')
@section('title', 'User | Permission')
@section('content')
    <div class="col-lg-6">
        <div class="ibox">
            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
            <div class="ibox-title"> Add Permissions </div>
            <div class="ibox-content">

                    <div class="mb-3">
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
            </div>
            <div class="ibox-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>
            </form>
        </div>
    </div>


    </div>
@endsection
