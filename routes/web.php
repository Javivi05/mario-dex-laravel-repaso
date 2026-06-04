<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/personajes/crear', [PersonajeController::class, 'create']);
Route::post('/personajes', [PersonajeController::class, 'store'])->name('personajes.store');