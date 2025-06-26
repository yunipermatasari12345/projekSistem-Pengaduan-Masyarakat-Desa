<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index']);
Route::post('/pengaduan/store', [HomeController::class, 'store'])->name('pengaduan.store');

// Login & Logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Area Admin (dilindungi login)
Route::middleware('auth')->prefix('admin')->group(function () {
    // Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');

    // Kategori
    Route::resource('/kategori', KategoriController::class);
});
