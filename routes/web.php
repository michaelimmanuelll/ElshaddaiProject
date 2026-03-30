<?php

use App\Http\Controllers\DataJemaatController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Utama sekarang langsung ke Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// 2. Resource route untuk CRUD Jemaat (Index, Create, Store, Edit, Update, Destroy)
// Ini sudah otomatis mencakup rute untuk data_jemaat
Route::resource('jemaat', DataJemaatController::class)->middleware('auth');

// 3. Rute tambahan untuk Export
Route::get('jemaat/export/{format}', [DataJemaatController::class, 'export'])->name('jemaat.export');


Route::get('/login', function () {
    return view('auth.login'); // Pastikan Anda membuat file resources/views/auth/login.blade.php
})->name('login');

// Memproses data login
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Data Jemaat (Hanya bisa diakses setelah login)
Route::middleware(['auth'])->group(function () {
    Route::resource('jemaat', DataJemaatController::class);
    Route::get('/dashboard', function () {
        return view('operator.dashboard');
    })->name('dashboard');
    // Rute Verifikasi Pendaftaran Baru
    Route::post('/jemaat/{id}/verifikasi', [\App\Http\Controllers\DataJemaatController::class, 'verifikasi'])->name('jemaat.verifikasi');
});

// Rute Publik (Untuk Pendaftaran via QR Code / HP)
Route::get('/daftar', [\App\Http\Controllers\DataJemaatController::class, 'formPendaftaran'])->name('pendaftaran.publik');
Route::post('/daftar', [\App\Http\Controllers\DataJemaatController::class, 'simpanPendaftaran'])->name('pendaftaran.simpan');