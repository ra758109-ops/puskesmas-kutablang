<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ServiceController;


Route::get('/', function () {
    return view('beranda');
});

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/program', function () {
    return view('program');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/berita/{slug}', function ($slug) {
    return view('berita-detail', ['slug' => $slug]);
});

Route::get('/profil', function () {
    return view('profil');
});

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-antrian', [App\Http\Controllers\PendaftaranController::class, 'cekAntrian'])->name('cek.antrian');
Route::get('/get-dokter/{poli_id}', [PendaftaranController::class, 'getDokter']);
Route::get('/pendaftaran', [PendaftaranController::class, 'index']);

//admin

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
         
 
Route::get('/layanan/create', [ServiceController::class, 'create'])->name('admin.services.create');
Route::post('/layanan/store', [ServiceController::class, 'store'])->name('admin.services.store');
        
        // Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        // Berita
        Route::get('/berita', function () {
            return view('admin.berita');
        });

        // Layanan (Disesuaikan agar sinkron dengan href sidebar kamu)
        Route::get('/layanan', [ServiceController::class, 'index'])->name('admin.services.index');

    
        Route::get('/pendaftar', function () {
            return view('admin.pendaftar');
        });
        
    });
});