<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Pesanan; // Pastikan model Pesanan diimport
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pelanggan dan riwayat pesanan.
     */
    public function show(): View
    {
        $user = Auth::guard('pelanggan')->user();

        // Mengambil 5 pesanan terbaru milik pelanggan yang sedang login
        // Pastikan di model Pesanan ada relasi ke pelanggan atau kolom pelanggan_id
        $orders = Pesanan::where('pelanggan_id', $user->id)
                    ->latest()
                    ->take(5)
                    ->get();

        return view('profile.show', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    /**
     * Menampilkan form edit profil pelanggan.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => Auth::guard('pelanggan')->user(),
        ]);
    }

    /**
     * Memperbarui informasi profil pelanggan.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::guard('pelanggan')->user();
        
        // Mengisi data berdasarkan request yang sudah divalidasi
        $user->fill($request->validated());

        // Update nama_lengkap jika ada di request
        if ($request->filled('nama_lengkap')) {
            $user->nama_lengkap = $request->nama_lengkap;
        }

        // Reset verifikasi email jika email diubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Menghapus akun pelanggan.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = Auth::guard('pelanggan')->user();

        Auth::guard('pelanggan')->logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}