@extends('app')

@section('page_title', "Support Tickets")

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.messages')
            <div class="row">
                <div class="col-md-3">
                  WELL THIS IS IN BETA
                    <a href="{{ action('UserController@index') }}">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">0</div>
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
                                            <div class="huge">999</div>
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
                                            <div class="huge">999</div>
                                            <div>Closed Tickets</div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </a>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
