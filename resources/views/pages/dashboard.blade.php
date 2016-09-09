@extends('app')

@section('page_title', "Dashboard")

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.messages')
            @role('admin')
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ action('ServerController@index') }}">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $server_count }}</div>
                                            <div>Active servers</div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ action('ServerController@index') }}">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">999</div>
                                            <div>Users connected</div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $open_tickets_count }}</div>
                                            <div>Active Tickets</div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </a>
                </div>
                <a href="#">
                <div class="col-md-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $closed_tickets_count }}</div>
                                            <div>Closed Tickets</div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </a>
                </div>
            </div>
            <hr>
                <div class="row">
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Ip</th>
                                  <th>Slots</th>
                                  <th>Status</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($servers as $server)
                                  <tr>
                                      <td>{{ $server->name }}</td>
                                      <td>{{ $server->ip }}:{{ $server->port }}</td>
                                      <td>{{ $server->slots }}</td>
                                      <td>
                                          <a href="{{ action('ServerController@show', $server) }}" class="btn btn-primary" style="width: 100%"><i class="fa fa-dot-circle-o"></i> View</a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      @if($servers->count() < 1)
                          <div class="alert alert-success" style="">
                              You don't have any servers yet.
                          </div>
                      @endif
                  </div>
              @endrole


              @role('user')
                  <div class="row">
                      <div class="col-md-3">
                          <a href="{{ action('UserController@index') }}">
                                  <div class="panel panel-green">
                                      <div class="panel-heading">
                                          <div class="row">
                                              <div class="col-xs-3">
                                                  <i class="fa fa-list fa-5x"></i>
                                              </div>
                                              <div class="col-xs-9 text-right">
                                                  <div class="huge">{{ $server_count_user }}</div>
                                                  <div>Active servers</div>
                                              </div>
                                          </div>
                                    </div>
                              </div>
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="{{ action('UserController@index') }}">
                                  <div class="panel panel-primary">
                                      <div class="panel-heading">
                                          <div class="row">
                                              <div class="col-xs-3">
                                                  <i class="fa fa-user fa-5x"></i>
                                              </div>
                                              <div class="col-xs-9 text-right">
                                                  <div class="huge">999</div>
                                                  <div>Users connected</div>
                                              </div>
                                          </div>
                                    </div>
                              </div>
                          </a>
                      </div>
                      <div class="col-md-3">
                          <a href="#">
                                  <div class="panel panel-yellow">
                                      <div class="panel-heading">
                                          <div class="row">
                                              <div class="col-xs-3">
                                                  <i class="fa fa-comments fa-5x"></i>
                                              </div>
                                              <div class="col-xs-9 text-right">
                                                  <div class="huge">{{ Kordy\Ticketit\Models\Ticket::active()->agentUserTickets($u->id)->count() }}</div>
                                                  <div>Active Tickets</div>
                                              </div>
                                          </div>
                                    </div>
                              </div>
                          </a>
                      </div>
                      <a href="#">
                      <div class="col-md-3">
                                  <div class="panel panel-red">
                                      <div class="panel-heading">
                                          <div class="row">
                                              <div class="col-xs-3">
                                                  <i class="fa fa-support fa-5x"></i>
                                              </div>
                                              <div class="col-xs-9 text-right">
                                                  <div class="huge">{{ Kordy\Ticketit\Models\Ticket::complete()->agentUserTickets($u->id)->count() }}</div>
                                                  <div>Closed Tickets</div>
                                              </div>
                                          </div>
                                    </div>
                              </div>
                          </a>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Ip</th>
                                    <th>Slots</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servers_user as $server)
                                    <tr>
                                        <td>{{ $server->name }}</td>
                                        <td>{{ $server->ip }}:{{ $server->port }}</td>
                                        <td>{{ $server->slots }}</td>
                                        <td>
                                            <a href="{{ action('UserController@show', $server) }}" class="btn btn-primary" style="width: 100%"><i class="fa fa-dot-circle-o"></i> View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($servers_user->count() < 1)
                            <div class="alert alert-success" style="">
                                You don't have any servers yet.
                            </div>
                        @endif
                    </div>
                  </div>
              @endrole
        </div>
    </div>
@endsection
