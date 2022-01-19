@extends('layouts.master')
@section('title', 'User | Register')
@section('classes_body','login-page')

@section('content')
    @include('layouts.common.auth_logo')
    <div class="container-fluid">
        <div class="card card-default">

            <div class="card-header">
                <h3 class="card-title float-none text-center">
                    {{ ('Register a new user') }}
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('register') }}" method="post" onSubmit="return check()">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class="col-6">
                            {{-- Name field --}}
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ old('name') }}" placeholder="{{ __('Full name') }}" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- Email field --}}
                            <div class="input-group mb-3">
                                <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- Password field --}}
                            <div class="input-group mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    placeholder="{{ __('Password') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- Confirm password field --}}
                            <div class="input-group mb-3">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                    placeholder="{{ __('Retype password') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- Blue_Tag --}}
                            <div class="input-group mb-3">
                                <input type="text" name="blue_tag" id="blue_tag" class="form-control {{ $errors->has('blue_tag') ? 'is-invalid' : '' }}"
                                    value="{{ old('blue_tag') }}" placeholder="{{ __('tag id') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-tag"></span>
                                    </div>
                                </div>
                                @if($errors->has('blue_tag'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('blue_tag') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-6">
                            {{-- Start Date --}}
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                    value="@if(old('start_date')){{ old('start_date') }}@else{{ date('Y-m-d') }}@endif" placeholder="{{ __('Start Date') }}">
                                @if($errors->has('start_date'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- Agency --}}
                            <div class="form-group">
                                <label>Start Date</label>
                                <select class="custom-select" id="agency" name="agency">
                                    <option value=''>Non Agency</option>
                                    @foreach($agencies as $agency)
                                        <option value='{{ $agency->id }}'>{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Role --}}
                            <div class="form-group">
                                <label>Role</label>
                                <select class="custom-select" id="role" name="role">
                                    <option>--- Select ---</option>
                                    @foreach($roles as $role)
                                        <option value='{{ $role->name }}'>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Team --}}
                            <div class="input-group mb-3">
                                <label>Team</label>
                                <input type="hidden" name="team" id="team" value="{{ old('team') }}" required="required">
                                <div id="treeparent">
                                    <div id="tree"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Register button --}}
                    <button type="submit" class="btn btn-block btn-primary">
                        <span class="fas fa-user-plus"></span>
                        {{ __('Register') }}
                    </button>

                </form>
            </div>

            <div class="card-footer ">
                <p class="my-0">
                    <a href="{{ route('login') }}">
                        {{ __('I already have a membership') }}
                    </a>
                </p>
            </div>

        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        //***  Tree View ***/
        ej.base.enableRipple(true);
        var teams = <?php echo json_encode($team_tree_view); ?>;
        var selected_team=$('#team').val();
        
        var treeObj = new ej.navigations.TreeView({
            fields: { dataSource: teams, id: 'id', parentID: 'pid', text: 'name', hasChildren: 'hasChild' },
            allowMultiSelection: false,
            selectedNodes: selected_team,
            nodeSelected: nodeSelected,
        });
        treeObj.appendTo('#tree');

        function nodeSelected(args) {
            console.log("The selected node's id: " + treeObj.selectedNodes);
            $('#team').val(treeObj.selectedNodes);
        }

        $(document).ready(function () {
            //enable tree view for team 
            var ele = document.getElementById('container');
            if(ele) {
                ele.style.visibility = "visible";
            }
        });
        
        function check(){
            /** Input Check */
            var email=$('#email').val();
            var pwd=$('#password').val();
            var pwd_comf=$('#password_confirmation').val();
            var blue_tag=$('#blue_tag').val();
            var role=$('#role').val();
            var team=$('#team').val();
            
            if (email.length!==0) {
                if (pwd.length==0) {
                    Swal.fire('Input Error','Please set password','error')
                    return false;
                } else if (pwd!=pwd_comf) {
                    Swal.fire('Input Error','Please Comfirm password','error')
                    return false;
                }
            } else if (blue_tag.length==0) {
                Swal.fire('Input Error','Please set email-password or blue_tag','error')
                return false;
            } else if (role.match(/---/)) {
                Swal.fire('Input Error','Please select role','error')
                return false;
            } else if (team.lengh==0){
                Swal.fire('Input Error','Please select team','error')
                return false;
            } else {
                return true;
            }
        }
    </script>
@endpush