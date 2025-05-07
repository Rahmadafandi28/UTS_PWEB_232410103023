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

Route::get('pengelolaan/tambah', [PageController::class, 'tambah_data']) ->name('tambah');
Route::post('pengelolaan/submit', [PageController::class, 'submit']) ->name('submit');
Route::get('pengelolaan/edit/{id}', [PageController::class, 'edit']) ->name('edit');
Route::post('pengelolaan/update/{id}', [PageController::class, 'update']) ->name('update');

// Route untuk edit
Route::get('/pengelolaan/{id}/edit', [PageController::class, 'edit'])->name('edit');

// Route untuk delete 
Route::delete('/pengelolaan/{id}/delete', [PageController::class, 'delete'])->name('delete');