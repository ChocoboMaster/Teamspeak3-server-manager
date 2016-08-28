@extends('app')

@section('page_title', 'Your servers')

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
                                        <a href="{{ action('UserController@show', $server) }}" class="btn btn-primary" style="width: 30%"><i class="fa fa-dot-circle-o"></i> View</a>
                                        <a href="{{ action('UserController@start', $server) }}" class="btn btn-success" style="width: 30%"><i class="fa fa-play"></i> Start</a>
                                    </td>
                                @endif
                                @if($server->status)
                                    <td>
                                        Running!
                                    </td>
                                    <td>
                                        <a href="{{ action('UserController@show', $server) }}" class="btn btn-primary" style="width: 30%"><i class="fa fa-dot-circle-o"></i> View</a>
                                        <a href="{{ action('UserController@restart', $server) }}" class="btn btn-warning" style="width: 30%"><i class="fa fa-repeat"></i> Restart</a>
                                        <a href="{{ action('UserController@stop', $server) }}" class="btn btn-danger" style="width: 30%"><i class="fa fa-ban"></i> Stop</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
