<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pelanggan;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data dinamis.
     */
    public function dashboard()
    {
        // 1. Data untuk Tabel Pesanan Terbaru
        $data_pesanan = Pesanan::with('pelanggan')->latest()->limit(5)->get();
        
        // 2. Data Statistik (Angka di kartu dasbor)
        $total_penjualan = Pesanan::sum('total_harga');
        $total_pesanan = Pesanan::count();
        $total_pelanggan = Pelanggan::count();
        $total_stok = Produk::sum('stok');

        return view('admin.dashboard', compact(
            'data_pesanan', 
            'total_penjualan', 
            'total_pesanan', 
            'total_pelanggan', 
            'total_stok'
        ));
    }

    /**
     * Menampilkan halaman form login khusus admin.
     */
    public function showLogin()
    {
        return view('admin.login'); 
    }

    /**
     * Memproses data login admin dari form.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cari admin berdasarkan email
        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();

        // Jika admin ditemukan dan password cocok
        if ($admin && \Illuminate\Support\Facades\Hash::check($credentials['password'], $admin->kata_sandi)) {
            // Login admin
            Auth::guard('admin')->login($admin, $request->filled('remember'));
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Email atau Kata Sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Memproses logout admin.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    }
}