
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="text-secondary"><b><i class="fa fa-clock-o"></i> {{ date('m-d-Y H:i:s') }} </b></span>
            </li>
            <li>
                @auth
                <a href="{{ route('logout') }}" class="text-danger">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
                @endauth
            </li>
        </ul>
    </nav>
</div>
