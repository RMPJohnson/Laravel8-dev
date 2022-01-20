@extends('layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>My Account</h5>
            </div>
            <div class="ibox-content">
                <form>
                    <div class="form-group row"><label class="col-lg-4 col-form-label">Name *</label>
                        <div class="col-lg-7">
                            <input type="text" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-lg-4 col-form-label">Email</label>
                        <div class="col-lg-7">
                            <input type="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="ibox-footer">
                <div class="form-group row text-right">
                    <div class="col-lg-offset-2 col-lg-12">
                        <button class="btn btn-sm btn-success" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
