<?php

Route::get('/info', function () {
    return view('welcome');
});

Route::get('/register', 'UsersController@getRegister');
Route::post('/register','Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@getLogout');

Route::get('/login', 'UsersController@getLogin');
Route::post('/login','Auth\AuthController@postLogin');

Route::get('/content','PostController@getContent');
Route::post('/content','PostController@postComment');

Route::get('/content/add','PostController@getAddContent');
Route::post('/content/add','PostController@postAddContent');