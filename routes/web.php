<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\VotoController;

Route::resource('enquetes', EnqueteController::class);
Route::post('/votar/{opcao}', [VotoController::class, 'votar'])->name('votar');
Route::get('/', function () {
    return view('welcome');
});
