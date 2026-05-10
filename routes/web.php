<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;


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



// admin
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/berita', function () {
    return view('admin.berita');
});

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

// Proteksi Dashboard (Hanya yang sudah login bisa masuk)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin/berita', function () {
        return view('admin.berita');
    });
});
