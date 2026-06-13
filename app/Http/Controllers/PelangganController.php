<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    // Menampilkan halaman form login pelanggan
    public function showLogin()
    {
        return view('pelanggan.login'); 
    }

    // Memproses data login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login menggunakan guard 'pelanggan'
        if (Auth::guard('pelanggan')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            
            $request->session()->regenerate();
            
            // Jika berhasil, arahkan ke halaman utama
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau Kata Sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Fitur Logout Pelanggan
    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Setelah logout, arahkan ke halaman login (pelanggan.login)
        return redirect()->route('pelanggan.login');
    }
}