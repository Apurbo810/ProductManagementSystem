<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


Route::get('/products', [IndexController::class, 'list']);


Route::get('/products/create', [IndexController::class, 'createForm']);


Route::post('/products', [IndexController::class, 'create']);


Route::get('/products/{id}', [IndexController::class, 'show']);


Route::get('/products/{id}/edit', [IndexController::class, 'edit']);

Route::put('/products/{id}', [IndexController::class, 'update']);



Route::delete('/products/{id}', [IndexController::class, 'delete']);
