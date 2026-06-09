<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProgramController;

// ==========================================
// HALAMAN USER / PENGUNJUNG PUBLIK
// ==========================================

// Beranda & Jadwal
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/profil', function () { return view('profil'); });

// Layanan & Program Publik
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

// Berita Publik
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('public.berita.detail');


// ==========================================
// FITUR INTERAKTIF USER (AJAX)
// ==========================================

// Pendaftaran Online & Cek Antrean (Gunakan Jalur PendaftaranController)
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);

// 🚀 JALUR UTAMA CEK ANTREAN AJAX (Disamakan dengan kodingan tim)
Route::get('/pendaftaran/cek', [PendaftaranController::class, 'cekAntrian'])->name('pendaftaran.cek');

// Kirim Review/Ulasan via AJAX
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');


// ==========================================
// AUTH SYSTEM (LOGIN / LOGOUT)
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// AREA ADMIN (TERPROTEKSI AUTH MIDDLEWARE)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Utama
    // URL: /admin/dashboard | Route Name: admin.dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Layanan Puskesmas
    Route::prefix('layanan')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // CRUD Berita Puskesmas
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BeritaController::class, 'update'])->name('update');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('destroy');
    });

    // Resource Dokter & Kontrol Status Aktif
    Route::resource('dokter', DokterController::class);
    Route::patch('/dokter/{id}/toggle-status', [DokterController::class, 'toggleStatus'])->name('dokter.toggleStatus');

    // Resource Pasien & Fitur Manajemen Antrean
    Route::resource('pasien', PasienController::class);
    Route::patch('/pasien/{id}/status/{status}', [PasienController::class, 'updateStatus'])->name('pasien.update-status');
    Route::get('/pasien/{id}/wa-review', [PasienController::class, 'sendWaReview'])->name('pasien.wa-review');

    // Resource Program Admin
    Route::resource('program', AdminProgramController::class);
});
