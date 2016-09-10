@extends('app')

@section('page_title', 'Server summary')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.messages')
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
                                @if(!$server->status)
                                    <td>
                                        Stopped!
                                    </td>
                                    <td>
                                        <a href="{{ action('Admin\ServerController@show', $server) }}" class="btn btn-primary" style="width: 30%"><i class="fa fa-dot-circle-o"></i> View</a>
                                        <a href="{{ action('Admin\ServerController@start', $server) }}" class="btn btn-success" style="width: 30%"><i class="fa fa-play"></i> Start</a>
                                    </td>
                                @endif
                                @if($server->status)
                                    <td>
                                        Running!
                                    </td>
                                    <td>
                                        <a href="{{ action('Admin\ServerController@show', $server) }}" class="btn btn-primary" style="width: 30%"><i class="fa fa-dot-circle-o"></i> View</a>
                                        <a href="{{ action('Admin\ServerController@restart', $server) }}" class="btn btn-warning" style="width: 30%"><i class="fa fa-repeat"></i> Restart</a>
                                        <a href="{{ action('Admin\ServerController@stop', $server) }}" class="btn btn-danger" style="width: 30%"><i class="fa fa-ban"></i> Stop</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ action('Admin\ServerController@create') }}" class="btn btn-primary" style="width: 100%"><i class="fa fa-plus"></i> Create New Server</a>
            </div>
            @if(!$servers->count())
                <div class="alert alert-info">
                    You don't have any servers yet. Click <a href="{{ action('Admin\ServerController@create') }}">here</a> to create one.
                </div>
            @endif
        </div>
    </div>
@endsection
