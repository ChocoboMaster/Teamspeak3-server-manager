@extends('app')

@section('page_title', 'View Server')

@section('content')
    <div class="row">
        @include('partials.messages')
        <div class="col-lg-6">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td>{{ $server->name }}</td>
                            </tr>
                            <tr>
                                <td>Host: </td>
                                <td><a href="ts3server://70.52.15.61?port={{ $server->port }}">70.52.15.61:{{ $server->port }}</a></td>
                            </tr>
                            <tr>
                                <td>Slots:</td>
                                <td>
                                  <div class="progress" style="margin-bottom:0; padding-bottom:0;">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$clientCount/$server->slots *100}}%; min-width: 3em;">
                                          {{ $clientCount }}/{{ $server->slots }}
                                      </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>@if($server->status) <span class="label label-success">Online</span> @else <span class="label label-danger">Offline</span> @endif</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $viewer !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th>Server actions</th>
                            </thead>
                            <tbody>
                            @if(!$server->status)
                                <tr>
                                    <td><a href="{{ action('UserController@start', $server) }}" class="btn btn-success" style="width: 100%"><i class="fa fa-play"></i> Start</a></td>
                                </tr>
                            @endif
                            @if($server->status)
                                <tr>
                                    <td><a href="{{ action('UserController@restart', $server) }}" class="btn btn-warning" style="width: 100%"><i class="fa fa-repeat"></i> Restart</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ action('UserController@stop', $server) }}" class="btn btn-danger" style="width: 100%"><i class="fa fa-ban"></i> Stop</a></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                            <th>Server configuration</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="{{ action('UserController@resetToken', $server) }}" class="btn btn-primary" style="width: 100%;"><i class="fa fa-plus"></i> Create token</a></td>
                            </tr>
                            <tr>
                                <td><a href="{{ action('UserController@showTokens', $server) }}" class="btn btn-primary" style="width: 100%;"><i class="fa fa-list"></i> Token summary</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@endsection
