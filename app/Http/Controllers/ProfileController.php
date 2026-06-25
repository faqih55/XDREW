<?php

namespace App\Http\Controllers;

use App\Models\Pesanan; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pelanggan dan riwayat pesanan.
     * HAPUS ": View" pada deklarasi fungsi agar tidak bentrok dengan redirect
     */
    public function show() 
    {
        $user = Auth::guard('pelanggan')->user();

        // Keamanan: Jika user null (sesi habis), arahkan ke login
        if (!$user) {
            return redirect()->route('pelanggan.login');
        }

        // Ambil 5 pesanan terbaru milik pelanggan ini
        $orders = Pesanan::where('ID_PELANGGAN', $user->getAuthIdentifier())
                    ->orderBy('TANGGAL_PESANAN', 'desc')
                    ->limit(5)
                    ->get();

        return view('profile.show', [
            'user'   => $user,
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
     * Menampilkan halaman alamat pengiriman pelanggan.
     */
    public function alamat(Request $request): View
    {
        return view('profile.alamat', [
            'user' => Auth::guard('pelanggan')->user(),
        ]);
    }

    /**
     * Memperbarui alamat pengiriman pelanggan.
     */
    public function updateAlamat(Request $request): RedirectResponse
    {
        $user = Auth::guard('pelanggan')->user();
        
        if (!$user) {
            return redirect()->route('pelanggan.login');
        }

        $validated = $request->validate([
            'provinsi' => ['nullable', 'string', 'max:255'],
            'kota'     => ['nullable', 'string', 'max:255'],
            'alamat'   => ['required', 'string'],
        ]);

        $user->PROVINSI = $validated['provinsi'];
        $user->KOTA     = $validated['kota'];
        $user->ALAMAT   = $validated['alamat'];
        $user->save();

        return redirect()->route('profile.alamat')->with('success', 'Alamat pengiriman berhasil diperbarui!');
    }

    /**
     * Menampilkan halaman keamanan/ganti password pelanggan.
     */
    public function keamanan(Request $request): View
    {
        return view('profile.keamanan', [
            'user' => Auth::guard('pelanggan')->user(),
        ]);
    }

    /**
     * Memperbarui kata sandi pelanggan.
     */
    public function updateKeamanan(Request $request): RedirectResponse
    {
        $user = Auth::guard('pelanggan')->user();
        
        if (!$user) {
            return redirect()->route('pelanggan.login');
        }

        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Verifikasi password lama
        if (!\Illuminate\Support\Facades\Hash::check($validated['current_password'], $user->getAuthPassword())) {
            return back()->withErrors(['current_password' => 'Kata sandi saat ini tidak cocok.']);
        }

        // Simpan password baru
        $user->KATA_SANDI = \Illuminate\Support\Facades\Hash::make($validated['password']);
        $user->save();

        return redirect()->route('profile.keamanan')->with('success', 'Kata sandi berhasil diperbarui!');
    }

    /**
     * Menampilkan halaman daftar pesanan milik pelanggan beserta filter status.
     */
    public function pesanan(Request $request): View
    {
        $query = Pesanan::where('ID_PELANGGAN', Auth::guard('pelanggan')->id())
            ->orderBy('TANGGAL_PESANAN', 'desc');

        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('STATUS_PESANAN', $request->status);
        }

        $orders = $query->get();
        $activeTab = $request->input('status', 'semua');

        return view('profile.pesanan', compact('orders', 'activeTab'));
    }

    /**
     * Menampilkan halaman Lacak Pesanan pelanggan.
     */
    public function lacak(Request $request)
    {
        $user = Auth::guard('pelanggan')->user();
        if (!$user) {
            return redirect()->route('pelanggan.login');
        }

        // Ambil semua pesanan milik pelanggan ini untuk ditampilkan di select option / list
        $orders = Pesanan::where('id_pelanggan', $user->getAuthIdentifier())
                    ->orWhere('ID_PELANGGAN', $user->getAuthIdentifier())
                    ->orderBy('TANGGAL_PESANAN', 'desc')
                    ->get();

        // Cari pesanan aktif jika ada param ID yang dicari
        $searchedOrder = null;
        $orderId = $request->input('order_id');
        if ($orderId) {
            // Bersihkan #ORD- atau #XD- jika user mengetik dengan format tersebut
            $cleanId = str_ireplace(['#ORD-', '#XD-'], '', $orderId);
            $cleanId = trim($cleanId);
            
            $searchedOrder = Pesanan::with(['detailPesanan.produk', 'pembayaran', 'pengiriman'])
                ->where(function($q) use ($user) {
                    $q->where('id_pelanggan', $user->getAuthIdentifier())
                      ->orWhere('ID_PELANGGAN', $user->getAuthIdentifier());
                })
                ->where('ID', $cleanId)
                ->first();
                
            if (!$searchedOrder) {
                session()->now('error', 'Pesanan dengan ID tersebut tidak ditemukan atau bukan milik Anda.');
            }
        }

        return view('profile.lacak', compact('orders', 'searchedOrder', 'orderId'));
    }

    /**
     * Memperbarui informasi profil pelanggan.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::guard('pelanggan')->user();
        
        if (!$user) {
            return redirect()->route('pelanggan.login');
        }
        
        $validated = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:PELANGGAN,EMAIL,' . ($user->ID ?? $user->id) . ',ID'],
            'no_telepon'     => ['nullable', 'string', 'max:20'],
            'alamat'         => ['nullable', 'string'],
            'foto'           => ['nullable', 'image', 'max:2048'],
        ]);

        // Menyelaraskan dengan penamaan atribut kolom di Oracle
        $user->NAMA_LENGKAP   = $validated['nama_pelanggan'];
        $user->EMAIL          = strtolower($validated['email']);
        
        if (isset($validated['no_telepon'])) $user->NOMOR_TELEPON = $validated['no_telepon'];
        if (isset($validated['alamat'])) $user->ALAMAT = $validated['alamat'];

        // Handle profile photo upload
        if ($request->hasFile('foto')) {
            $oldFoto = $user->FOTO ?? $user->foto;
            if ($oldFoto && \Illuminate\Support\Facades\Storage::disk('public')->exists($oldFoto)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldFoto);
            }
            $path = $request->file('foto')->store('profile_photos', 'public');
            $user->FOTO = $path;
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