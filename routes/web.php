<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EvaluacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('ideas', IdeaController::class)->middleware(['auth']);

Route::get('usuarios', [AdminController::class, 'verUsuarios'])->name('verUsuarios')->middleware(['auth']);
Route::get('usuarios/{id}', [AdminController::class, 'verUsuario'])->name('usuarios.show')->middleware(['auth']);
Route::get('usuarios/{id}/edit', [AdminController::class, 'editUsuario'])->name('usuarios.edit')->middleware(['auth']);
Route::put('usuarios/{id}', [AdminController::class, 'updateUsuario'])->name('usuarios.update')->middleware(['auth']);

Route::get('ideas/gestor/{id}', [IdeaController::class, 'asignarGestor'])->name('ideas.asignar-gestor')->middleware(['auth']);
Route::put('ideas/gestor/{id}', [IdeaController::class, 'guardarGestor'])->name('ideas.guardar-gestor')->middleware(['auth']);
Route::get('ideas/evaluadores/{id}', [IdeaController::class, 'asignarEvaluadores'])->name('ideas.asignar-evaluadores')->middleware(['auth']);
Route::put('ideas/evaluadores/{id}', [IdeaController::class, 'guardarEvaluadores'])->name('ideas.guardar-evaluadores')->middleware(['auth']);
Route::get('ideas/evaluacion/estados/{id}', [IdeaController::class, 'estadoEvaluacion'])->name('ideas.estado-evaluacion')->middleware(['auth']);
Route::get('ideas/evaluacion/resultados/{id}', [IdeaController::class, 'resultadosEvaluacion'])->name('ideas.resultadosEvaluacion')->middleware(['auth']);

Route::get('evaluar/', [EvaluacionController::class, 'indexEvaluar'])->name('evaluar.index')->middleware(['auth']);
Route::get('evaluar/{id}', [EvaluacionController::class, 'irEvaluar'])->name('evaluar.irEvaluar')->middleware(['auth']);
Route::post('evaluar', [EvaluacionController::class, 'store'])->name('evaluacion.store')->middleware(['auth']);
Route::get('evaluacion/{id}', [EvaluacionController::class, 'show'])->name('evaluacion.show')->middleware(['auth']);
Route::get('evaluar/{id}/edit', [EvaluacionController::class, 'irEditarEvaluacion'])->name('evaluar.irEditarEvaluacion')->middleware(['auth']);
Route::put('evaluar/{id}', [EvaluacionController::class, 'update'])->name('evaluacion.update')->middleware(['auth']);
Route::post('evaluar', [EvaluacionController::class, 'finalStore'])->name('evaluacion.final-store')->middleware(['auth']);
