<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    // 1. Menambahkan barang ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'produk_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'ukuran_terpilih' => 'required'
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $cart = session()->get('cart', []);
        
        $cartKey = $produk->id . '-' . $request->ukuran_terpilih;

        if(isset($cart[$cartKey])) {
            $cart[$cartKey]['jumlah'] += $request->jumlah;
        } else {
            $cart[$cartKey] = [
                "id_produk" => $produk->id,
                "nama_produk" => $produk->NAMA_PRODUK ?? $produk->nama_produk,
                "ukuran" => $request->ukuran_terpilih,
                "jumlah" => $request->jumlah,
                "harga" => $produk->HARGA ?? $produk->harga,
                "foto" => $produk->FOTO ?? $produk->foto
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // 2. Menampilkan halaman keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // AMAN UNTUK ORACLE: Menggunakan get() -> shuffle() -> take() agar tidak error ORA-00904
        $related_products = Produk::get()->shuffle()->take(4);
        
        // Memanggil file keranjang.blade.php
        return view('keranjang', compact('cart', 'related_products'));
    }

    // 3. Update jumlah barang di keranjang
    public function update(Request $request)
    {
        if($request->id && $request->jumlah){
            $cart = session()->get('cart');
            $cart[$request->id]["jumlah"] = $request->jumlah;
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
    }

    // 4. Hapus barang dari keranjang
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}