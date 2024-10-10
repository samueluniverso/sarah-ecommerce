<?php

use App\Http\Controllers\PessoaFisicaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\PromocaoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

/**
 * Usuario
 */
Route::post('/login', [
    UserAuthController::class, 'login'
]);

Route::post('/logout', [
    UserAuthController::class, 'logout'
])->middleware('auth:sanctum');

Route::post('/register', [
    UserAuthController::class, 'register'
]);

/**
 * Pessoa Fisica
 */
Route::get('/pessoa-fisica/{id}', [
    PessoaFisicaController::class, 'get'
])->middleware('auth:sanctum');

Route::get('/pessoa-fisica/{limit}{offset}', [
    PessoaFisicaController::class, 'list'
])->middleware('auth:sanctum');

Route::post('/pessoa-fisica/', [
    PessoaFisicaController::class, 'store'
]);

Route::delete('/pessoa-fisica/{id}', [
    PessoaFisicaController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/pessoa-fisica/', [
    PessoaFisicaController::class, 'update'
])->middleware('auth:sanctum');


/**
 * Categoria
 */
Route::get('/categoria/{id}', [
    CategoriaController::class, 'get'
])->middleware('auth:sanctum');

Route::post('/categoria/', [
    CategoriaController::class, 'store'
])->middleware('auth:sanctum');

Route::delete('/categoria/{id}', [
    CategoriaController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/categoria/', [
    CategoriaController::class, 'update'
])->middleware('auth:sanctum');

/**
 * Marca
 */
Route::get('/marca/{id}', [
    MarcaController::class, 'get'
])->middleware('auth:sanctum');

Route::post('/marca/', [
    MarcaController::class, 'store'
])->middleware('auth:sanctum');

Route::delete('/marca/{id}', [
    MarcaController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/marca/', [
    MarcaController::class, 'update'
])->middleware('auth:sanctum');


/**
 * Medida
 */
Route::get('/medida/{id}', [
    MedidaController::class, 'get'
])->middleware('auth:sanctum');

Route::post('/medida/', [
    MedidaController::class, 'store'
])->middleware('auth:sanctum');

Route::delete('/medida/{id}', [
    MedidaController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/medida/', [
    MedidaController::class, 'update'
])->middleware('auth:sanctum');


/**
 * Promocao
 */
Route::get('/promocao/{id}', [
    PromocaoController::class, 'get'
])->middleware('auth:sanctum');

Route::post('/promocao/', [
    PromocaoController::class, 'store'
])->middleware('auth:sanctum');

Route::delete('/promocao/{id}', [
    PromocaoController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/promocao/', [
    PromocaoController::class, 'update'
])->middleware('auth:sanctum');

/**
 * Produto
 */
Route::get('/produto/{id}', [
    ProdutoController::class, 'get'
])->middleware('auth:sanctum');

Route::post('/produto/', [
    ProdutoController::class, 'store'
])->middleware('auth:sanctum');

Route::delete('/produto/{id}', [
    ProdutoController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/produto/', [
    ProdutoController::class, 'update'
])->middleware('auth:sanctum');


Route::prefix('produtos')->group(function() {
    Route::get('/paginar/limit/{limit}/offset/{offset}', [
        ProdutoController::class, 'paginar'
    ]);
    // ->middleware('auth:sanctum');

    Route::post('/buscar', [
        ProdutoController::class, 'buscar'
    ]);
    // ->middleware('auth:sanctum');
});