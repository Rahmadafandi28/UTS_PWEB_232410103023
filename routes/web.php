<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Halaman utama mengarah ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman login
Route::get('/login', [PageController::class, 'login'])->name('login');

// Proses login (POST)
Route::post('/login', [PageController::class, 'authenticate']);

// Halaman dashboard (diproteksi)
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

// Proses logout
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

// Halaman Pengelolaan
Route::get('/pengelolaan', [PageController::class, 'pengelolaan']) ->name('pengelolaan');

// Halaman Profile
Route::get('/profile', [PageController::class, 'profile']) ->name('profile');