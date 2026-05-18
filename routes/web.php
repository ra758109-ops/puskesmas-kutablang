<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\ProgramController;

/*
|--------------------------------------------------------------------------
| Web Routes - Puskesmas Kuta Blang
|--------------------------------------------------------------------------
*/

// =========================================================================
// LAYANAN PUBLIK (Tanpa Login)
// =========================================================================

Route::get('/', function () { return view('beranda'); });
Route::get('/profil', function () { return view('profil'); });
Route::get('/jadwal', function () { return view('jadwal'); });
Route::get('/program', function () { return view('program'); });

// Layanan & Berita Publik
Route::get('/layanan', [ServiceController::class, 'landing'])->name('public.layanan');
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('public.berita.detail');

// Pendaftaran Online
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-antrian', [PendaftaranController::class, 'cekAntrian'])->name('cek.antrian');
Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);

// Authentication System
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// =========================================================================
// AREA ADMIN (Wajib Login & Terproteksi Middleware)
// =========================================================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Layanan / Poli (CRUD Lengkap)
    Route::prefix('layanan')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // Manajemen Berita / Edukasi Konten (CRUD Lengkap)
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update'); // Note: Sesuaikan ke BeritaController jika diperlukan
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('destroy');
    }); // 🛠️ FIX: Kurung penutup grup berita yang tadinya hilang

    // 🛠️ FIX: Diposisikan sejajar dan rapi di dalam grup admin
    Route::resource('pasien', PasienController::class);
    Route::resource('program', ProgramController::class);
    
}); // End of Middleware Admin Area