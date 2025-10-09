<?php

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
Route::get('/admin', [PageController::class, 'admin'])->name('admin'); 


// Rutas de administración de usuarios por rol
Route::prefix('administrador')->name('administrador')->group(function () {
    Route::get('/usuarios/{role?}', [UserController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
});