<?php

use App\Http\Controllers\PessoaFisicaController;
use App\Http\Controllers\PessoaJuridicaController;
use App\Http\Controllers\UserAuthController;
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
 * Pessoa juridica
 */
Route::get('/pessoa-juridica/{id}', [
    PessoaJuridicaController::class, 'get'
])->middleware('auth:sanctum');

Route::post('/pessoa-juridica/', [
    PessoaJuridicaController::class, 'store'
]);

Route::delete('/pessoa-juridica/{id}', [
    PessoaJuridicaController::class, 'delete'
])->middleware('auth:sanctum');

Route::put('/pessoa-juridica/', [
    PessoaJuridicaController::class, 'update'
])->middleware('auth:sanctum');