<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Route;

Route::get('/personajes', [PersonajeController::class, 'index']);
Route::post('/personajes', [PersonajeController::class, 'store']);
Route::delete('/personajes/{id}', [PersonajeController::class, 'destroy']);