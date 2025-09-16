<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/signIn', function () {
    return view('signIn');
})->name('signIn');
