<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Menyimpan review dari sisi Pasien (AJAX)
     */
    public function store(Request $request)
    {
        // 1. Validasi data (Hapus 'nik' jika memang tidak dicatat langsung di tabel reviews)
        $request->validate([
            'pendaftaran_id' => 'required',
            'rating'         => 'required|integer|min:1|max:5',
            'komentar'       => 'nullable|string|max:1000',
        ]);

        // 2. Simpan data review ke database
        Review::create([
            'pendaftaran_id' => $request->pendaftaran_id,
            'rating'         => $request->rating,
            'komentar'       => $request->komentar,
        ]);

        // 3. Respon sukses untuk AJAX
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '✨ Ulasan berhasil disimpan! Terima kasih atas penilaian Anda.'
            ]);
        }

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }

    /**
     * Menampilkan review di Dashboard Admin
     */
    public function index()
    {
        // Mengambil ulasan terbaru berserta data pendaftaran/pasien setianya
        $reviews = Review::with('pendaftaran')->latest()->paginate(10);
        return view('admin.review', compact('reviews'));
    }

    /**
     * Menghapus review oleh Admin
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }
};