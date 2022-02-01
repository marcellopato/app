<?php

use Illuminate\Support\Facades\Route;

Route::get('/short', ['App\Http\Controllers\URLController', 'index']);
Route::post('/short', ['App\Http\Controllers\URLController', 'short']);
Route::get('/short/{link}', ['App\Http\Controllers\URLController', 'shortLink']);
Route::get('/', function () {
    return view('welcome');
});
