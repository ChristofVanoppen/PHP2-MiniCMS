<?php

Route::get('/info', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register','Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@getLogout');

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login','Auth\AuthController@postLogin');

