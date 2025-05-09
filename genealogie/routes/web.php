<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;

Route::get('/', [PersonController::class, 'index'])->name('index');
Route::get('/show/{id}', [PersonController::class, 'show'])->name('person.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/create', [PersonController::class, 'create'])->name('create');
    Route::post('/store', [PersonController::class, 'store'])->name('person.store');
});