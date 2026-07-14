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
            $query->where('UKURAN', 'LIKE', '%' . $request->input('ukuran') . '%');
        }

        if ($request->filled('warna')) {
            $query->where('WARNA', 'LIKE', '%' . $request->input('warna') . '%');
        }

        if ($request->filled('harga_maksimal')) {
            $query->where('HARGA', '<=', $request->input('harga_maksimal'));
        }

        $sort = $request->input('sort', 'newest');
        if ($sort === 'price-asc') {
            $query->orderBy('HARGA', 'asc');
        } elseif ($sort === 'price-desc') {
            $query->orderBy('HARGA', 'desc');
        } else {
            // newest
            $query->orderBy('CREATED_AT', 'desc');
        }

        // Gunakan paginate dan pertahankan query string
        $produk = $query->paginate(25)->withQueryString();

        $selectedKategori = $request->input('kategori', '');
        $selectedUkuran = $request->input('ukuran', '');
        $selectedWarna = $request->input('warna', '');
        $hargaMaksimal = $request->input('harga_maksimal', 7000000); // Default 7jt

        return view('produk', compact('produk', 'selectedKategori', 'selectedUkuran', 'selectedWarna', 'hargaMaksimal', 'sort'));
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