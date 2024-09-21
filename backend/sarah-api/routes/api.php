<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [
    UserAuthController::class, 'login'
]);

Route::post('/logout', [
    UserAuthController::class, 'logout'
])->middleware('auth:sanctum');

Route::post('/register', [
    UserAuthController::class, 'register'
]);

Route::put('/salvar-categoria', [
    CategoriaController::class, 'store'
]);

Route::post('/salvar-categoria', [
    CategoriaController::class, 'update'
]);

// Route::put('/salvar-categoria', [
//     CategoriaController::class, 'store'
// ])->middleware('auth:sanctum');