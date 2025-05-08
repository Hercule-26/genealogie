<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/', [PersonController::class, 'index'])->name('index');
Route::get('/show/{id}', [PersonController::class, 'show'])->name('person.show');
Route::get('/login', [PersonController::class, 'create'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/create', [PersonController::class, 'create'])->name('create');
    Route::post('/store', [PersonController::class, 'store'])->name('person.store');
});