<div class="navbar-header">
    <a class="navbar-brand" href="index.html">Teamspeak 3 server manager</a>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        @if(Auth::check())
            <li @if(Request::is('/')) class="active" @endif>
                <a href="{{ action('DashboardController@index') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            @role('admin')
                <li @if(Request::is('servers')) class="active" @endif>
                    <a href="{{ action('ServerController@index') }}"><i class="fa fa-fw fa-list"></i> Servers</a>
                </li>

                <li @if(Request::is('servers/create')) class="active" @endif>
                    <a href="{{ action('ServerController@create') }}"><i class="fa fa-fw fa-plus"></i> Create server</a>
                </li>
                <li>
                    <a href="{{ action('Auth\AuthController@getLogout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            @endrole
            @role('user')
                <li @if(Request::is('servers')) class="active" @endif>
                    <a href="{{ action('UserController@index') }}"><i class="fa fa-fw fa-list"></i> Servers</a>
                </li>
                <li>
                    <a href="{{ action('Auth\AuthController@getLogout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            @endrole
        @else
            <li>
                <a href="{{ action('Auth\AuthController@getLogin') }}"><i class="fa fa-fw fa-sign-in"></i> Login</a>
            </li>
        @endif
    </ul>
</div>
