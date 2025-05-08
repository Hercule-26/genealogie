<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/', [PersonController::class, 'index'])->name('index');
Route::get('/show', [PersonController::class, 'show'])->name('show');
Route::get('/create', [PersonController::class, 'create'])->name('create');
Route::post('/store', [PersonController::class, 'store'])->name('store');