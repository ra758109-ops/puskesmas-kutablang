<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;


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

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/cek-antrian', [App\Http\Controllers\PendaftaranController::class, 'cekAntrian'])->name('cek.antrian');


// admin
Route::get('/admin', function () {
    return view('admin.dashboard'); 
});

Route::get('/admin/berita', function () {
    return view('admin.berita'); 
});

use App\Http\Controllers\AuthController; // Kamu perlu buat controller ini

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