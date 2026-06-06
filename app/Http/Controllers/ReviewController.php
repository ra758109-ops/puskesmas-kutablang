<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Pastikan model Review sudah ada

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi data ulasan yang dikirim dari form
        $request->validate([
            'nik' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        // 2. Simpan data review ke dalam database
        Review::create([
            'nik' => $request->nik,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        // 3. Kembalikan response sukses jika request via AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Ulasan berhasil disimpan! Terima kasih atas penilaian Anda.'
            ]);
        }

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }
}
