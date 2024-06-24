<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

// caminho da URL e método do controller
Route::get('/', [VendaController::class, 'index']);

Route::resource('clientes', ClienteController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('vendas', VendaController::class);
