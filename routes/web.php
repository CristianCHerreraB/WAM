<?php

use App\Http\Controllers\ClavadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signIn', function () {
    return view('signIn');
})->name('signIn');

// Página principal
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

// Rutas para las diferentes páginas
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/descubre', [PageController::class, 'descubre'])->name('descubre');
Route::get('/biblioteca', [PageController::class, 'biblioteca'])->name('biblioteca');
Route::get('/informes', [PageController::class, 'informes'])->name('informes');
Route::get('/grupos', [PageController::class, 'grupos'])->name('grupos');
Route::get('/idiomas', [PageController::class, 'idiomas'])->name('idiomas');
Route::get('/marketplace', [PageController::class, 'marketplace'])->name('marketplace');
Route::get('/password', [PageController::class, 'password'])->name('password');
Route::get('/otras-apps', [PageController::class, 'otrasApps'])->name('otras-apps');
Route::get('/ayuda', [PageController::class, 'ayuda'])->name('ayuda'); 
