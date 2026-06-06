<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program; // 🚀 Mengimpor model program

class ProgramController extends Controller
{
    public function index()
    {
        // Mengambil semua data program dari database yang di-input oleh admin
        $programs = Program::latest()->get();

        // Mengirimkan data tersebut ke view program milik user
        return view('program', compact('programs'));
    }
}