<?php


use App\Http\Controllers\cal_participante;
use App\Http\Controllers\ClavadoController;
use App\Http\Controllers\PageTWOController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CalJuezController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});




// Página principal
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/tutorial', [PageController::class, 'tutorial'])->name('tutorial');
Route::get('/biblioteca', [PageController::class, 'biblioteca'])->name('biblioteca');
Route::get('/informes', [PageController::class, 'informes'])->name('informes');
Route::get('/grupos', [PageController::class, 'grupos'])->name('grupos');
Route::get('/idiomas', [PageController::class, 'idiomas'])->name('idiomas');
Route::get('/marketplace', [PageController::class, 'marketplace'])->name('marketplace');
Route::get('/password', [PageController::class, 'password'])->name('password');
Route::get('/otras-apps', [PageController::class, 'otrasApps'])->name('otras-apps');
Route::get('/ayuda', [PageController::class, 'ayuda'])->name('ayuda'); 

Route::get('/tutorial', [PageTWOController::class, 'tutorial'])->name('tutorial');
Route::get('/competencia', [PageTWOController::class, 'competencia'])->name('competencia');
Route::get('/reglas', [PageTWOController::class, 'reglas'])->name('reglas');
Route::get('/calendario', [PageTWOController::class, 'calendario'])->name('calendario');
Route::get('/patrocinadores', [PageTWOController::class, 'patrocinadores'])->name('patrocinadores');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//recuperadas
Route::get('/add_responce_judge', [ClavadoController::class, 'addResult'])->name('viewResponceJusge');
Route::get('/changeStop/{id}/{status}', [ClavadoController::class, 'changeStop'])->name('changeStop');
Route::post('/save_results', [cal_participante::class, 'save_results'])->name('save_results');
Route::post('/save_check_judge', [CalJuezController::class, 'save_check_judge'])->name('save_check_judge');
Route::get('/view_result', [CalJuezController::class, 'viewResult'])->name('view_result');
Route::get('/athlete_list/{id_clavado}', [CalJuezController::class, 'athleteList'])->name('athleteList');
Route::post('/athleteResult/{id_clavadista}/{id_clavado}', [CalJuezController::class, 'athleteResult'])->name('athleteResult');


Route::get('/view_add_dives', [PageController::class, 'viewDives'])->name('addDives');
Route::get('/save_dives', [ClavadoController::class, 'create'])->name('create');
Route::get('/all_dives', [ClavadoController::class, 'index'])->name('index');
Route::get('/dive_in_live', [ClavadoController::class, 'divesInLive'])->name('divesInLive');
Route::get('/changeStop/{id}', [ClavadoController::class, 'changeStop'])->name('changeStop');
Route::post('/save_check', [cal_participante::class, 'save_check'])->name('save_check');

Route::get('/torneos', [PageController::class, 'torneosEnCurso'])->name('torneosEnCurso');
Route::get('/qualify', [PageController::class, 'qualifyAthlete'])->name('qualifyAthlete');
Route::get('/torneos/result', [PageController::class, 'torneosResult'])->name('torneosResult');
Route::get('/changeStop/{id}', [ClavadoController::class, 'changeStop'])->name('changeStop');

Route::get('/userManagment', [PageController::class, 'userManagment'])->name('userManagment');


Route::get('/ranking', [cal_participante::class, 'Ranking'])->name('Ranking');

require __DIR__.'/auth.php';
require __DIR__ . '/rutas_cristian.php';   

