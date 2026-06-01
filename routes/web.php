<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataJemaatController;
use App\Http\Controllers\AuthController;

// |--------------------------------------------------------------------------
// | HALAMAN PUBLIK
// |--------------------------------------------------------------------------
// | Bisa diakses tanpa login
// |

// Dashboard / Landing Page Gereja
Route::get('/', function () {
    return view('publik.dashboard');
})->name('dashboard');

// Form pendaftaran jemaat publik
Route::get('/pendaftaran', [DataJemaatController::class, 'formPendaftaran'])
    ->name('pendaftaran.publik');

// Proses simpan pendaftaran publik
Route::post('/pendaftaran', [DataJemaatController::class, 'simpanPendaftaran'])
    ->name('pendaftaran.simpan');



// |--------------------------------------------------------------------------
// | AUTHENTIKASI
// |--------------------------------------------------------------------------
// */

// Form Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses Login
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');



// |--------------------------------------------------------------------------
// | AREA ADMIN / OPERATOR
// |--------------------------------------------------------------------------
// | Wajib login
// |
// */

Route::middleware(['auth'])->group(function () {

    // Dashboard Operator/Admin
    Route::get('/admin', function () {
        return view('operator.data_jemaat');
    })->name('admin.dashboard');

    // CRUD Data Jemaat
    Route::resource('jemaat', DataJemaatController::class);

    // Verifikasi Jemaat
    Route::put('/jemaat/{id}/verifikasi',
        [DataJemaatController::class, 'verifikasi'])
        ->name('jemaat.verifikasi');

});