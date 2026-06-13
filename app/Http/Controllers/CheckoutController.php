<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Detail_Pesanan;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // 1. Validasi agar data tidak kosong
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        // 2. Simpan Pesanan Utama
        // Gunakan Auth::guard('pelanggan') agar tidak tertukar dengan auth admin
        $pesanan = Pesanan::create([
            'pelanggan_id' => Auth::guard('pelanggan')->id(), 
            'nama_penerima' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'total_harga' => session('total_harga', 0),
            'status' => 'Pending'
        ]);

        // 3. Simpan Item Pesanan
        foreach (session('cart', []) as $id => $item) {
            Detail_Pesanan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $id,
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga']
            ]);
        }

        session()->forget('cart');
        session()->forget('total_harga');

        // Arahkan ke rute pesanan.show yang akan menampilkan Detail_Pesanan.blade.php
        return redirect()->route('pesanan.show', $pesanan->id);
    }

    public function show($id)
    {
        // Menggunakan model Pesanan yang sudah kita update relasinya
        $pesanan = Pesanan::with('details.produk')->findOrFail($id);
        
        // Mengarahkan ke file view: resources/views/Detail_Pesanan.blade.php
        return view('Detail_Pesanan', compact('pesanan'));
    }
}