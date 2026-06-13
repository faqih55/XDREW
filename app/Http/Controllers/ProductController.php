<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Fungsi untuk menampilkan daftar produk
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('kategori')) {
            $query->where('KATEGORI', $request->input('kategori'));
        }

        if ($request->filled('ukuran')) {
            $query->where('UKURAN', $request->input('ukuran'));
        }

        $produk = $query->get();
        $selectedKategori = $request->input('kategori', '');
        $selectedUkuran = $request->input('ukuran', '');

        return view('produk', compact('produk', 'selectedKategori', 'selectedUkuran'));
    }

    // FUNGSI SEARCH YANG SUDAH DIPERBAIKI
    public function search(Request $request)
    {
        $query = $request->input('query');

        // PERHATIAN: Saya menghapus 'orWhere(deskripsi)' karena itu penyebab error Anda.
        // Silakan ganti 'NAMA_PRODUK' di bawah ini jika nama kolom di database Anda berbeda.
        $produk = Produk::where('NAMA_PRODUK', 'LIKE', "%{$query}%")
                        ->get();

        $selectedKategori = '';
        $selectedUkuran = '';

        return view('produk', compact('produk', 'selectedKategori', 'selectedUkuran'));
    }

    // ==========================================
    // FUNGSI UNTUK MENAMPILKAN DETAIL PRODUK
    // ==========================================
    public function show($id)
    {
        // 1. Ambil 1 produk spesifik berdasarkan ID dari database
        $produk = Produk::findOrFail($id);

        // 2. Ambil 4 produk acak untuk bagian "Lengkapi Gaya Anda"
        // SOLUSI FINAL: Menggunakan get() -> shuffle() -> take(4)
        // Ini menghindari penggunaan fungsi RANDOM() SQL yang tidak dikenali Oracle
        $related_products = Produk::where('ID', '!=', $id)
                                  ->get()
                                  ->shuffle()
                                  ->take(4);

        // 3. Tampilkan ke view detail.blade.php dan kirim datanya
        return view('detail', compact('produk', 'related_products'));
    }
}