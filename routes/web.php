<?php

use Illuminate\Support\Facades\Route;

// userAI - user
use App\Http\Controllers\UserAI\ProfileController;
use App\Http\Controllers\UserAI\ProductController;
use App\Http\Controllers\UserAI\PriceController;
use App\Http\Controllers\UserAI\ReportController;

use App\Http\Controllers\AulaController;
use App\Http\Controllers\FrequenciaController;

// SAdmin
use App\Http\Controllers\SAdmin\ProfileSAController;
use App\Http\Controllers\SAdmin\UserController;
use App\Http\Controllers\UserAI\UsersController;

Route::get('/', function () {
    return redirect('login');
});
Route::get('/promptsHome', function () {
    return view('site.promptsHome');
});

// userAI - user
Route::group(['middleware' => 'userAI'], function () {

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('product', ProductController::class);
    Route::resource('price', PriceController::class);
    Route::resource('report', ReportController::class);


    Route::resource('users', UsersController::class);

    // Rota para o Professor ver e habilitar a aula
    Route::get('/aula/{id}/painel', [AulaController::class, 'painel'])->name('aula.painel');
    Route::post('/aula/{id}/toggle', [AulaController::class, 'toggle'])->name('aula.toggle');

    // Rota para o Aluno bater a frequência
    Route::get('/checkin/{id}', [FrequenciaController::class, 'create'])->name('frequencia.create');
    Route::post('/checkin/{id}', [FrequenciaController::class, 'store'])->name('frequencia.store');





    Route::get('/aulas', [AulaController::class, 'index'])->name('aula.index');
    Route::get('/aulas/create', [AulaController::class, 'create'])->name('aula.create');
    Route::post('/aulas/store', [AulaController::class, 'store'])->name('aula.store');
    Route::post('/aulas/toggle/{id}', [AulaController::class, 'toggle'])->name('aula.toggle');
    Route::get('/aulas/relatorio/{id}', [AulaController::class, 'relatorio'])->name('aula.relatorio');

    // Rotas de Relatórios
    Route::get('/relatorios', function () {
        return view('report.index');
    })->name('report.index');
});


//Route::middleware(['auth'])->group(function () {
//  Route::get('/aulas', [AulaController::class, 'index'])->name('aula.index');
// Route::get('/aulas/create', [AulaController::class, 'create'])->name('aula.create');
// Route::post('/aulas/store', [AulaController::class, 'store'])->name('aula.store');
// Route::post('/aulas/toggle/{id}', [AulaController::class, 'toggle'])->name('aula.toggle');
// Route::get('/aulas/relatorio/{id}', [AulaController::class, 'relatorio'])->name('aula.relatorio');
// }); 

// SAdmin
Route::group(['middleware' => 'superadmin'], function () {
    Route::resource('users', UserController::class);
    Route::get('/profileSA', [ProfileSAController::class, 'edit'])->name('profileSA.edit');
    Route::patch('/profileSA', [ProfileSAController::class, 'update'])->name('profileSA.update');
});

require __DIR__ . '/auth.php';
