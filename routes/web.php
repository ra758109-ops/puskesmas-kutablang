<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasienController;

// ==========================================
// HALAMAN USER / PENGUNJUNG
// ==========================================

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil
Route::get('/profil', function () {
    return view('profil');
});

// Jadwal
Route::get('/jadwal', function () {
    return view('jadwal');
});

// Program
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

// Layanan
Route::get('/layanan', [ServiceController::class, 'landing'])->name('public.layanan');

// Berita
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('public.berita.detail');


// ==========================================
// PENDAFTARAN ONLINE
// ==========================================

Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('/cek-antrian', [PendaftaranController::class, 'cekAntrian'])->name('cek.antrian');

Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);


// ==========================================
// AUTH LOGIN
// ==========================================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'processLogin']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// AREA ADMIN
// ==========================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ======================================
    // CRUD LAYANAN
    // ======================================

    Route::prefix('layanan')->name('services.')->group(function () {

        Route::get('/', [ServiceController::class, 'index'])->name('index');

        Route::get('/create', [ServiceController::class, 'create'])->name('create');

        Route::post('/store', [ServiceController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');

        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');

        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });


    // ======================================
    // CRUD BERITA
    // ======================================

    Route::prefix('berita')->name('berita.')->group(function () {

        Route::get('/', [BeritaController::class, 'index'])->name('index');

        Route::get('/create', [BeritaController::class, 'create'])->name('create');

        Route::post('/store', [BeritaController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('edit');

        Route::put('/{id}', [BeritaController::class, 'update'])->name('update');

        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('destroy');
    });


    // ======================================
    // RESOURCE
    // ======================================

    Route::resource('pasien', PasienController::class);

    Route::resource('program', ProgramController::class);
});