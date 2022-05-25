@extends('layouts.app')
@section('title', 'Permission Management')
@section('content')
<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-title">
            Manage Permissions
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right"> <i class="fa fa-plus"></i> Add permission</a>
        </div>
        <div class="ibox-content"></div>
        <div class="ibox-footer"></div>
    </div>
</div>

