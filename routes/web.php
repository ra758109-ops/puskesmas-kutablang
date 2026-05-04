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
