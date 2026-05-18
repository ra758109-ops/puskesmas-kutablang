<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Admin\ServiceController;

// ==========================================
// 1. HALAMAN USER / PENGUNJUNG (DINAMIS)
// ==========================================

// Beranda Utama (Menggunakan HomeController agar data Poli & Dokter muncul)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

// Halaman Program (Menampilkan data dinamis program/kegiatan puskesmas)
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

Route::get('/profil', function () {
    return view('profil');
});

// ==========================================
// 2. FITUR PENDAFTARAN & BERITA (USER SISI)
// ==========================================
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-antrian', [PendaftaranController::class, 'cekAntrian'])->name('cek.antrian');
Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);

Route::get('/berita', function () {
    return view('berita');
});
Route::get('/berita/{slug}', function ($slug) {
    return view('berita-detail', ['slug' => $slug]);
});

// ==========================================
// 3. HALAMAN LOGIN AUTHENTICATION
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 4. SISI ADMIN (DENGAN PROTEKSI LOGIN)
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        // Manajemen Berita Sisi Admin
        Route::get('/berita', function () {
            return view('admin.berita');
        });

        // Kelola data pendaftar puskesmas
        Route::get('/pendaftar', function () {
            return view('admin.pendaftar');
        });

        // Fitur Layanan / Services dari Kawanmu
        Route::get('/layanan', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::get('/layanan/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('/layanan/store', [ServiceController::class, 'store'])->name('admin.services.store');

    });
});
