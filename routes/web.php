<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BeritaController;

// ==========================================
// LAYANAN PUBLIK (Tanpa Login)
// ==========================================

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

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// AREA ADMIN (Wajib Login)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('Admin.dashboard');
    })->name('dashboard');

    // Manajemen Layanan (CRUD Lengkap)
    Route::prefix('layanan')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // Manajemen Berita (CRUD Lengkap)
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BeritaController::class, 'update'])->name('update');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('destroy');
    });

    // Manajemen Pendaftar
    Route::get('/pendaftar', function () {
        return view('Admin.pendaftar');
    })->name('pendaftar.index');
    
}); // Penutup Middleware Auth