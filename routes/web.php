<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\PainelIndicadores;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SituacoesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('chamados', ChamadosController::class);
    Route::get('/delete/{chamado}', [ChamadosController::class, 'delete'])->name('chamados.delete');
    Route::post('/resolver/{chamado}', [ChamadosController::class, 'resolver'])->name('chamados.resolver');
    Route::post('/atender/{chamado}', [ChamadosController::class, 'atender'])->name('chamados.atender');
    Route::get('/iniciar_atender/{chamado}', [ChamadosController::class, 'iniciarAtender'])->name('chamados.iniciar_atendimento');
    Route::get('/marcar_resolvido/{chamado}', [ChamadosController::class, 'marcarResolvido'])->name('chamados.marcar_resolvido');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriasController::class);
    Route::get('/delete/{categoria}', [CategoriasController::class, 'delete'])->name('categorias.delete');

});

Route::middleware(['auth'])->group(function () {
    Route::resource('situacao', SituacoesController::class, ['names' => 'situacoes']);
    Route::get('/delete/{situacao}', [SituacoesController::class, 'delete'])->name('situacoes.delete');
});

Route::middleware('auth')->group(function(){
   Route::get('/indicadores', [PainelIndicadores::class, 'index'])->name('indicadores.index');
   Route::post('/indicadores', [PainelIndicadores::class, 'filtrar'])->name('indicadores.filtrar');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
