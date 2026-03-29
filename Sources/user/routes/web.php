<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/debug', fn() => "Server: " . env('NODE_NAME'));
