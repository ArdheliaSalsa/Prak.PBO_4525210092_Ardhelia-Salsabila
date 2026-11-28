<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/buku/get-all', [BukuController::class, 'index']);
Route::post('/buku/create', [BukuController::class, 'store']);
Route::get('/buku/{id}', [BukuController::class, 'show']);
Route::put('/buku/{id}', [BukuController::class, 'update']);
Route::delete('/buku/{id}', [BukuController::class, 'destroy']);
