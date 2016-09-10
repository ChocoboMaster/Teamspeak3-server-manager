<?php

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'admin'], function(){
        Route::resource('/servers', 'Admin\ServerController');
        Route::get('/servers/{id}/start', 'Admin\ServerController@start');
        Route::get('/servers/{id}/restart', 'Admin\ServerController@restart');
        Route::get('/servers/{id}/stop', 'Admin\ServerController@stop');
        Route::get('/servers/{id}/reset', 'Admin\ServerController@resetToken');
        Route::get('/servers/{id}/tokens', 'Admin\ServerController@showTokens');
        Route::get('/servers/{id}/token/{token_id}/delete', 'Admin\ServerController@deleteToken');
        Route::get('/servers/{id}/configure', 'Admin\ServerController@showConfigure');
        Route::post('/servers/{id}/configure', 'Admin\ServerController@postConfigure');

        Route::get('/users', 'Admin\UsersController@index');
    });

    Route::get('/servers', 'User\ServerController@index');
    Route::get('/servers/{id}/show', 'User\ServerController@show');
    Route::get('/servers/{id}/start', 'User\ServerController@start');
    Route::get('/servers/{id}/restart', 'User\ServerController@restart');
    Route::get('/servers/{id}/stop', 'User\ServerController@stop');
    Route::get('/servers/{id}/reset', 'User\ServerController@resetToken');
    Route::get('/servers/{id}/tokens', 'User\ServerController@showTokens');
    Route::get('/servers/{id}/token/{token_id}/delete', 'User\ServerController@deleteToken');
    Route::get('/servers/add', 'User\ServerController@add');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
