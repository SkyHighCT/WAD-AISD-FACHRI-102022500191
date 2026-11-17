<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenghuniController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('penghuni.index'));

// Hanya tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Harus login
Route::middleware('auth')->group(function () {
    // admin & user boleh melihat daftar
    Route::get('penghuni', [PenghuniController::class, 'index'])->name('penghuni.index');

    // hanya admin: tambah, ubah, hapus
    Route::middleware('role:admin')->group(function () {
        Route::resource('penghuni', PenghuniController::class)->except(['index', 'show']);
    });
});
