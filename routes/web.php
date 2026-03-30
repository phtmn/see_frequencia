<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AulaController;
use App\Http\Controllers\FrequenciaController;

// userAI - user
use App\Http\Controllers\UserAI\ProfileController;

// SAdmin
use App\Http\Controllers\SAdmin\ProfileSAController;
use App\Http\Controllers\SAdmin\UserController;


Route::get('/', function () {
    return redirect('login');
});


// userAI - user
Route::group(['middleware' => 'userAI'], function () {

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/aulas', [AulaController::class, 'index'])->name('aula.index');
    // Rota para processar o formulário do modal
    Route::post('/aulas/store', [App\Http\Controllers\AulaController::class, 'store'])->name('aula.store');

    // Rota para o toggle (Habilitar/Encerrar) que já está na sua index
    Route::post('/aulas/toggle/{id}', [App\Http\Controllers\AulaController::class, 'toggle'])->name('aula.toggle');

    // Rota para o Relatório
    Route::get('/aulas/relatorio/{id}', [App\Http\Controllers\AulaController::class, 'relatorio'])->name('aula.relatorio');


    Route::delete('/aulas/{id}', [App\Http\Controllers\AulaController::class, 'destroy'])->name('aula.destroy');

    // Rota para o Aluno bater a frequência
    Route::get('/checkin/{id}', [FrequenciaController::class, 'create'])->name('frequencia.create');
    Route::post('/checkin/{id}', [FrequenciaController::class, 'store'])->name('frequencia.store');


});


Route::get('/presenca', [FrequenciaController::class, 'index'])->name('aluno.presenca');
Route::post('/presenca/registrar', [FrequenciaController::class, 'store'])->name('aluno.registrar');

// SAdmin
Route::group(['middleware' => 'superadmin'], function () {
    Route::resource('users', UserController::class);
    Route::get('/profileSA', [ProfileSAController::class, 'edit'])->name('profileSA.edit');
    Route::patch('/profileSA', [ProfileSAController::class, 'update'])->name('profileSA.update');
});

require __DIR__ . '/auth.php';
