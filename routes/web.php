<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\SituacoesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'chamados', 'as' => 'chamados.'], function () {
    Route::resource('/', ChamadosController::class);
});

Route::group(['prefix' => 'categorias', 'as' => 'categorias.'], function () {
    Route::resource('/', CategoriasController::class);
});

Route::group(['prefix' => 'situacoes', 'as' => 'situacoes.'], function () {
    Route::resource('/', SituacoesController::class);
});
Route::get('/store', [SituacoesController::class, 'store']);
