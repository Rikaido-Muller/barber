<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BarbeariaController;
use App\Http\Controllers\BarbeirosController;
use App\Http\Controllers\ServicoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('clientes', ClienteController::class);
Route::resource('barbearias', BarbeariaController::class);
Route::resource('barbeiros', BarbeirosController::class);
Route::resource('servicos', ServicoController::class);
    
require __DIR__.'/auth.php';
