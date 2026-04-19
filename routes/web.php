<?php

use Illuminate\Support\Facades\Route;


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
