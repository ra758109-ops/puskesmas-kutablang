<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\AdminProgramController as AdminProgramController;

// ==========================================
// HALAMAN USER / PENGUNJUNG
// ==========================================

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil
Route::get('/profil', function () {
    return view('profil');
});

// Layanan Publik
Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');

// Jadwal Praktik Dokter/Nakes
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

// Program Kegiatan
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

// Berita Publik
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('public.berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('public.berita.detail');


// ==========================================
// PENDAFTARAN ONLINE (SINKRON DENGAN AJAX BLADE)
// ==========================================
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
// 🚀 FIX: Nama route diubah dari 'cek.antrian' menjadi 'pendaftaran.cek' agar sesuai dengan AJAX di Blade
Route::get('/pendaftaran/cek', [PendaftaranController::class, 'cekAntrian'])->name('pendaftaran.cek');
Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);


// ==========================================
// AUTH LOGIN
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// AREA ADMIN (TERPROTEKSI AUTH)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD LAYANAN
    Route::prefix('layanan')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // CRUD BERITA
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/store', [BeritaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BeritaController::class, 'update'])->name('update');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('destroy');
    });

    // Resource Dokter & Saklar Kontrol Status Aktif
    Route::resource('dokter', DokterController::class);
    Route::patch('/dokter/{id}/toggle-status', [DokterController::class, 'toggleStatus'])->name('dokter.toggleStatus');
    
    // Resource Pasien & Fitur Tambahannya
    Route::resource('pasien', PasienController::class);
    Route::patch('/pasien/{id}/status/{status}', [PasienController::class, 'updateStatus'])->name('pasien.update-status');
    Route::get('/pasien/{id}/wa-review', [PasienController::class, 'sendWaReview'])->name('pasien.wa-review');
    
    // Resource Program Admin (Gunakan alias yang di-import di atas)
    Route::resource('program', AdminProgramController::class);
});