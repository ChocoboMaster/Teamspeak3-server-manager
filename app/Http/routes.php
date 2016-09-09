<?php

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'admin'], function(){
        Route::resource('/servers', 'ServerController');
        Route::get('/servers/{id}/start', 'ServerController@start');
        Route::get('/servers/{id}/restart', 'ServerController@restart');
        Route::get('/servers/{id}/stop', 'ServerController@stop');
        Route::get('/servers/{id}/reset', 'ServerController@resetToken');
        Route::get('/servers/{id}/tokens', 'ServerController@showTokens');
        Route::get('/servers/{id}/token/{token_id}/delete', 'ServerController@deleteToken');
        Route::get('/servers/{id}/configure', 'ServerController@showConfigure');
        Route::post('/servers/{id}/configure', 'ServerController@postConfigure');
        Route::get('/users', 'ServerController@showUsers');
    });

    Route::get('/servers', 'UserController@index');
    Route::get('/servers/{id}/show', 'UserController@show');
    Route::get('/servers/{id}/start', 'UserController@start');
    Route::get('/servers/{id}/restart', 'UserController@restart');
    Route::get('/servers/{id}/stop', 'UserController@stop');
    Route::get('/servers/{id}/reset', 'UserController@resetToken');
    Route::get('/servers/{id}/tokens', 'UserController@showTokens');
    Route::get('/servers/{id}/token/{token_id}/delete', 'UserController@deleteToken');
    Route::get('/servers/add', 'UserController@add');

    Route::get('/support', 'UserSupportController@index');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::get('/auth/register', 'Auth\AuthController@getRegister');
//Route::get('/install', 'InstallController@index');
//Route::post('/install', 'InstallController@install');
