<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use App\Models\Pelanggan;
use App\Models\Admin;
use App\Notifications\SystemNotification;

class PelangganController extends Controller
{
    /**
     * Menampilkan halaman form login pelanggan
     */
    public function showLogin()
    {
        // Jika sudah login, langsung ke halaman utama
        if (Auth::guard('pelanggan')->check()) {
            return redirect()->route('home');
        }
        return view('pelanggan.login'); 
    }

    /**
     * Memproses data login
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = strtolower($request->email);
        $pelanggan = Pelanggan::whereRaw('LOWER(EMAIL) = ?', [$email])->first();

        // Verifikasi password menggunakan Hash
        if ($pelanggan && Hash::check($request->password, $pelanggan->getAuthPassword())) {
            
            // Kirim notifikasi ke admin
            try {
                $admins = Admin::all();
                $custName = $pelanggan->getAttribute('nama_lengkap') ?? $pelanggan->getAttribute('NAMA_LENGKAP') ?? 'Pelanggan';
                foreach ($admins as $adm) {
                    $adm->notify(new SystemNotification(
                        'Pelanggan Masuk Sesi! 🔑',
                        'Pelanggan <strong>' . $custName . '</strong> (' . $email . ') baru saja masuk ke akun mereka.',
                        'login',
                        '#eab308',
                        route('admin.pelanggan')
                    ));
                }
            } catch (\Exception $admNotifErr) {
                Log::warning('Gagal mengirim notifikasi login ke admin: ' . $admNotifErr->getMessage());
            }

            // Login menggunakan guard 'pelanggan'
            Auth::guard('pelanggan')->login($pelanggan);
            
            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();
            
            Log::info('Login Berhasil: ' . $email);
            
            // DIPERBAIKI: Mengarahkan langsung ke rute 'home'
            // Ini akan mengabaikan URL lama yang mungkin tersangkut di sesi dan menyebabkan 404
            return redirect()->route('home'); 
        }

        Log::warning('Login Gagal untuk email: ' . $email);
        
        return back()->withErrors([
            'email' => 'Email atau Kata Sandi salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout Pelanggan
     */
    public function logout(Request $request): RedirectResponse
    {
        // Logout hanya untuk guard pelanggan
        Auth::guard('pelanggan')->logout();
        
        // Hapus sesi dan regenerasi token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }

    /**
     * Menampilkan halaman form registrasi pelanggan
     */
    public function showRegister()
    {
        // Jika sudah login, langsung ke halaman utama
        if (Auth::guard('pelanggan')->check()) {
            return redirect()->route('home');
        }
        return view('pelanggan.register'); 
    }

    /**
     * Memproses data registrasi pelanggan baru
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:PELANGGAN,EMAIL'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'no_telepon'   => ['nullable', 'string', 'max:20'],
            'provinsi'     => ['nullable', 'string', 'max:255'],
            'kota'         => ['nullable', 'string', 'max:255'],
            'kabupaten'    => ['nullable', 'string', 'max:255'],
            'alamat'       => ['nullable', 'string'],
            'foto'         => ['nullable', 'image', 'max:10240'],
        ]);

        // Handle profile photo upload with compression
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'profile_photos/' . $filename;
            
            $destinationPath = storage_path('app/public/' . $path);
            
            if (!file_exists(storage_path('app/public/profile_photos'))) {
                mkdir(storage_path('app/public/profile_photos'), 0755, true);
            }
            
            $mime = $file->getMimeType();
            $quality = 60; // Compression quality
            
            try {
                if ($mime == 'image/jpeg') {
                    $image = imagecreatefromjpeg($file->getRealPath());
                    imagejpeg($image, $destinationPath, $quality);
                } elseif ($mime == 'image/png') {
                    $image = imagecreatefrompng($file->getRealPath());
                    imagealphablending($image, false);
                    imagesavealpha($image, true);
                    imagepng($image, $destinationPath, 8);
                } elseif ($mime == 'image/webp') {
                    $image = imagecreatefromwebp($file->getRealPath());
                    imagewebp($image, $destinationPath, $quality);
                } else {
                    $path = $file->store('profile_photos', 'public');
                }
                
                if (isset($image)) {
                    imagedestroy($image);
                }
                
                $fotoPath = $path;
            } catch (\Exception $e) {
                // Fallback if compression fails
                $fotoPath = $file->store('profile_photos', 'public');
            }
        }

        // Simpan ke Database
        $pelanggan = Pelanggan::create([
            'NAMA_LENGKAP'  => $validated['nama_lengkap'],
            'EMAIL'         => strtolower($validated['email']),
            'KATA_SANDI'    => Hash::make($validated['password']),
            'NOMOR_TELEPON' => $validated['no_telepon'] ?? null,
            'PROVINSI'      => $validated['provinsi'] ?? null,
            'KOTA'          => $validated['kota'] ?? null,
            'KABUPATEN'     => $validated['kabupaten'] ?? null,
            'ALAMAT'        => $validated['alamat'] ?? null,
            'FOTO'          => $fotoPath,
        ]);

        // Kirim notifikasi ke admin
        try {
            $admins = Admin::all();
            foreach ($admins as $adm) {
                $adm->notify(new SystemNotification(
                    'Pendaftaran Pelanggan Baru! 👤',
                    'Pelanggan baru bernama <strong>' . $validated['nama_lengkap'] . '</strong> (' . strtolower($validated['email']) . ') telah bergabung.',
                    'person_add',
                    '#3b82f6',
                    route('admin.pelanggan')
                ));
            }
        } catch (\Exception $admNotifErr) {
            Log::warning('Gagal mengirim notifikasi registrasi ke admin: ' . $admNotifErr->getMessage());
        }

        // Login menggunakan guard 'pelanggan'
        Auth::guard('pelanggan')->login($pelanggan);
        
        // Regenerasi sesi untuk keamanan
        $request->session()->regenerate();
        
        Log::info('Registrasi Pelanggan Berhasil: ' . $validated['email']);
        
        return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
    }
}