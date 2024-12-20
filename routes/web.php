<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index');
Route::get('/form', 'FormController@show');
Route::post('/form', 'FormController@submit');
Route::get('/data', 'FormController@showData');
