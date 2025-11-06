<?php

use App\Http\Controllers\cal_participante;
use App\Http\Controllers\CalJuezController;
use App\Http\Controllers\ClavadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
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


// Página principal Torneos en curso 
Route::get('/add_responce_judge', [ClavadoController::class, 'addResult'])->name('viewResponceJusge');
Route::get('/view_add_dives', [PageController::class, 'viewDives'])->name('addDives');
Route::get('/save_dives', [ClavadoController::class, 'create'])->name('create');
Route::get('/all_dives', [ClavadoController::class, 'index'])->name('index');
Route::get('/dive_in_live', [ClavadoController::class, 'divesInLive'])->name('divesInLive');
Route::get('/changeStop/{id}/{status}', [ClavadoController::class, 'changeStop'])->name('changeStop');
Route::post('/save_check', [cal_participante::class, 'save_check'])->name('save_check');
Route::post('/save_results', [cal_participante::class, 'save_results'])->name('save_results');
Route::post('/save_check_judge', [CalJuezController::class, 'save_check_judge'])->name('save_check_judge');
Route::get('/view_result', [CalJuezController::class, 'viewResult'])->name('viewResult');
Route::get('/athlete_list/{id_clavado}', [CalJuezController::class, 'athleteList'])->name('athleteList');
Route::post('/athleteResult/{id_clavadista}/{id_clavado}', [CalJuezController::class, 'athleteResult'])->name('athleteResult');

Route::get('/torneos', [PageController::class, 'torneosEnCurso'])->name('torneosEnCurso');
Route::get('/qualify', [PageController::class, 'qualifyAthlete'])->name('qualifyAthlete');
Route::get('/torneos/result', [PageController::class, 'torneosResult'])->name('torneosResult');
