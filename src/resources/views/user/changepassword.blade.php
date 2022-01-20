@extends('layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Change Password</h5>
            </div>
            <div class="ibox-content">
                <form>
                    <p>Sign in today for more experience.</p>
                    <div class="form-group row"><label class="col-lg-4 col-form-label">Old Password *</label>
                        <div class="col-lg-7">
                            <input type="password" placeholder="Old Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-lg-4 col-form-label">Password *</label>
                        <div class="col-lg-7">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-lg-4 col-form-label">Change Password *</label>
                        <div class="col-lg-7">
                            <input type="password" placeholder="Change Password" class="form-control">
                        </div>
                    </div>

                </form>
            </div>
            <div class="ibox-footer">
                <div class="form-group row text-right">
                    <div class="col-lg-offset-2 col-lg-12">
                        <button class="btn btn-sm btn-success" type="submit">Change password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
