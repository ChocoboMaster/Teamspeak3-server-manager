<div class="container-fluid">
  <div class="navbar-header">
    <a href="#" class="navbar-brand">TS3 Server Manager</a>
  </div>

  <ul class="nav navbar-nav navbar-right">
    @if(Auth::check())
      <li><a href="#"><i class="fa fa-fw fa-sign-out"></i> {{{ Auth::user()->email }}}</a></li>
    @else
      <li><a href="#"><i class="fa fa-fw fa-user"></i> Login</a></li>
    @endif
  </ul>
</div>

<div class="container-fluid" style="padding:0;">
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
                  <li @if(Request::is('support')) class="active" @endif>
                      <a href="#"><i class="fa fa-fw fa-support"></i> Support</a>
                  </li>
                  <li>
                      <a href="{{ action('Auth\AuthController@getLogout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                  </li>
              @endrole
          @else
              <li>
                  <a href="{{ action('Auth\AuthController@getLogin') }}"><i class="fa fa-fw fa-sign-in"></i> Login</a>
              </li>
              <li>
                  <a href="{{ action('Auth\AuthController@getRegister') }}"><i class="fa fa-fw fa-tasks"></i> Register</a>
              </li>
          @endif
      </ul>
</div>
