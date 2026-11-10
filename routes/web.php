<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman Login
Route::get('/', [PageController::class, 'login']);

// Proses Login
Route::post('/login', [PageController::class, 'authenticate']);

// Halaman Beranda
Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard');

// Halaman Pengelolaan
Route::get('/pengelolaan', [PageController::class, 'pengelolaan']);

// Halaman Profil
Route::get('/profile', [PageController::class, 'profile']);