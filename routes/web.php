<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BeritaController;


Route::get('/', function () {
    return view('beranda');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/program', function () {
    return view('program');
});

// Layanan Publik
Route::get('/layanan', [ServiceController::class, 'landing'])->name('public.layanan');

// Berita Publik
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('public.berita.detail');

// Pendaftaran Online
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-antrian', [PendaftaranController::class, 'cekAntrian'])->name('cek.antrian');
Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('Admin.dashboard');
    })->name('dashboard');

    // Manajemen Layanan
    Route::prefix('layanan')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
    });

    // Manajemen Berita
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
    });

    // Manajemen Pendaftar
    Route::get('/pendaftar', function () {
        return view('Admin.pendaftar');
    })->name('pendaftar.index');
    
});