<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Admin;
use App\Notifications\SystemNotification;

class AdminController extends Controller
{
    /**
     * Constructor - Middleware auth untuk semua method
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['showLogin', 'login', 'showRegister', 'register']);
    }

    // ============================================================================
    // AUTHENTICATION (Login/Logout)
    // ============================================================================

    /**
     * Menampilkan halaman form login admin.
     */
    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Memproses data login admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang kembali!');
        }

        return back()
            ->withErrors(['email' => 'Email atau kata sandi yang Anda masukkan salah.'])
            ->onlyInput('email');
    }

    /**
     * Memproses logout admin.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Menampilkan halaman form registrasi admin.
     */
    public function showRegister()
    {
        return view('admin.register');
    }

    /**
     * Memproses data registrasi admin baru.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_admin' => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:ADMIN,EMAIL'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = Admin::create([
            'NAMA_ADMIN' => $validated['nama_admin'],
            'EMAIL'      => strtolower($validated['email']),
            'KATA_SANDI' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        ]);

        Auth::guard('admin')->login($admin);
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Berhasil mendaftar dan masuk sebagai Admin!');
    }

    // ============================================================================
    // PROFIL ADMIN
    // ============================================================================

    public function editProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        
        $validated = $request->validate([
            'nama_admin' => ['required', 'string', 'max:255'],
            // Karena Oracle, unique check bisa rumit jika case-sensitive, jadi abaikan email unique sementara jika sama,
            // atau gunakan rule sederhana.
            'email'      => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $admin->KATA_SANDI = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $admin->NAMA_ADMIN = $validated['nama_admin'];
        $admin->EMAIL = strtolower($validated['email']);
        $admin->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }

    // ============================================================================
    // DASHBOARD
    // ============================================================================

    /**
     * Menampilkan halaman dashboard admin dengan data dinamis.
     */
    public function dashboard()
    {
        try {
            // Oracle PDO mengembalikan kolom lowercase — gunakan orderByDesc dengan nama kolom asli
            $data_pesanan = Pesanan::with('pelanggan')
                            ->orderByDesc('id')
                            ->limit(5)
                            ->get();
        } catch (\Exception $e) {
            $data_pesanan = collect();
        }

        $total_penjualan = (int)(Pesanan::sum('total_harga') ?? 0);
        $total_pesanan   = Pesanan::count();
        $total_pelanggan = Pelanggan::count();
        $total_stok      = (int)(Produk::sum('stok') ?? 0);
        $total_produk    = Produk::count();

        // Data penjualan per bulan — Oracle compatible
        $chart_data = array_fill(0, 12, 0);
        try {
            $salesData = Pesanan::selectRaw(
                "EXTRACT(MONTH FROM tanggal_pesanan) as bulan, SUM(total_harga) as total"
            )
            ->whereRaw("EXTRACT(YEAR FROM tanggal_pesanan) = ?", [date('Y')])
            ->groupByRaw("EXTRACT(MONTH FROM tanggal_pesanan)")
            ->pluck('total', 'bulan');

            $monthlySales = array_fill(1, 12, 0);
            foreach ($salesData as $bulan => $total) {
                $monthlySales[(int)$bulan] = round($total / 1000000, 2);
            }
            $chart_data = array_values($monthlySales);
        } catch (\Exception $e) {
            // Jika query gagal, chart akan tampil kosong
        }

        return view('admin.dashboard', compact(
            'data_pesanan',
            'total_penjualan',
            'total_pesanan',
            'total_pelanggan',
            'total_stok',
            'total_produk',
            'chart_data'
        ));
    }

    // ============================================================================
    // INVENTARIS / PRODUK
    // ============================================================================

    /**
     * Menampilkan daftar semua produk.
     */
    public function inventaris(Request $request)
    {
        $search = $request->query('search');
        $query = Produk::query();
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_produk', 'LIKE', "%{$search}%")
                  ->orWhere('kategori', 'LIKE', "%{$search}%")
                  ->orWhere('warna', 'LIKE', "%{$search}%")
                  ->orWhere('ukuran', 'LIKE', "%{$search}%")
                  ->orWhere('status_produk', 'LIKE', "%{$search}%")
                  ->orWhere('NAMA_PRODUK', 'LIKE', "%{$search}%")
                  ->orWhere('KATEGORI', 'LIKE', "%{$search}%")
                  ->orWhere('WARNA', 'LIKE', "%{$search}%")
                  ->orWhere('UKURAN', 'LIKE', "%{$search}%")
                  ->orWhere('STATUS_PRODUK', 'LIKE', "%{$search}%");
            });
        }
        $data_produk = $query->orderByDesc('id')->paginate(10)->withQueryString();
        return view('admin.produk.index', compact('data_produk'));
    }

    /**
     * Menampilkan form tambah produk baru.
     */
    public function createProduk()
    {
        return view('admin.produk.create');
    }

    /**
     * Memproses penyimpanan produk baru ke database.
     */
    public function storeProduk(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'ukuran'      => 'required|string|max:100',
            'warna'       => 'required|string|max:100',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'foto'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk harus diisi.',
            'kategori.required'    => 'Kategori harus dipilih.',
            'ukuran.required'      => 'Ukuran harus diisi.',
            'warna.required'       => 'Warna harus diisi.',
            'harga.required'       => 'Harga harus diisi.',
            'harga.numeric'        => 'Harga harus berupa angka.',
            'stok.required'        => 'Stok harus diisi.',
            'foto.required'        => 'Foto produk harus diunggah.',
            'foto.image'           => 'File harus berupa gambar.',
        ]);

        // Proses Upload Foto
        $nama_foto = 'default.jpg';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());

            // Simpan ke folder public/images
            $file->move(public_path('images'), $nama_foto);
        }

        // Simpan ke Database
        try {
            Produk::create([
                'NAMA_PRODUK'   => $validated['nama_produk'],
                'KATEGORI'      => $validated['kategori'],
                'UKURAN'        => $validated['ukuran'],
                'WARNA'         => $validated['warna'],
                'HARGA'         => $validated['harga'],
                'STOK'          => $validated['stok'],
                'STATUS_PRODUK' => 'Tersedia',
                'FOTO'          => $nama_foto,
            ]);

            return redirect()->route('admin.inventaris')
                ->with('success', 'Koleksi baru berhasil ditambahkan ke inventaris!');
        } catch (\Exception $e) {
            // Hapus foto jika gagal menyimpan ke database
            if (file_exists(public_path('images/' . $nama_foto))) {
                unlink(public_path('images/' . $nama_foto));
            }

            return back()
                ->withErrors(['error' => 'Gagal menyimpan produk: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Menampilkan form edit produk.
     */
    public function editProduk($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Memproses update data produk.
     */
    public function updateProduk(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'ukuran'      => 'required|string|max:100',
            'warna'       => 'required|string|max:100',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $nama_foto = $produk->getAttribute('foto') ?? $produk->getAttribute('FOTO');

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($nama_foto && $nama_foto !== 'default.jpg' && file_exists(public_path('images/' . $nama_foto))) {
                unlink(public_path('images/' . $nama_foto));
            }
            $file      = $request->file('foto');
            $nama_foto = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images'), $nama_foto);
        }

        $produk->update([
            'NAMA_PRODUK'   => $validated['nama_produk'],
            'KATEGORI'      => $validated['kategori'],
            'UKURAN'        => $validated['ukuran'],
            'WARNA'         => $validated['warna'],
            'HARGA'         => $validated['harga'],
            'STOK'          => $validated['stok'],
            'FOTO'          => $nama_foto,
        ]);

        return redirect()->route('admin.inventaris')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk beserta fotonya.
     */
    public function destroyProduk($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->route('admin.inventaris')
                ->withErrors(['error' => 'Produk tidak ditemukan.']);
        }

        try {
            $foto = $produk->getAttribute('foto') ?? $produk->getAttribute('FOTO');
            if ($foto && $foto !== 'default.jpg' && file_exists(public_path('images/' . $foto))) {
                unlink(public_path('images/' . $foto));
            }
            $produk->delete();

            return redirect()->route('admin.inventaris')
                ->with('success', 'Produk berhasil dihapus dari inventaris.');
        } catch (\Exception $e) {
            return redirect()->route('admin.inventaris')
                ->withErrors(['error' => 'Gagal menghapus produk: ' . $e->getMessage()]);
        }
    }

    // ============================================================================
    // PESANAN
    // ============================================================================

    /**
     * Menampilkan daftar semua pesanan.
     */
    public function pesanan(Request $request)
    {
        $search = $request->query('search');
        $query = Pesanan::with(['pelanggan', 'detailPesanan.produk']);
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'LIKE', "%{$search}%")
                  ->orWhere('ID', 'LIKE', "%{$search}%")
                  ->orWhere('status_pesanan', 'LIKE', "%{$search}%")
                  ->orWhere('STATUS_PESANAN', 'LIKE', "%{$search}%")
                  ->orWhere('total_harga', 'LIKE', "%{$search}%")
                  ->orWhere('TOTAL_HARGA', 'LIKE', "%{$search}%")
                  ->orWhereHas('pelanggan', function($pq) use ($search) {
                      $pq->where('nama_lengkap', 'LIKE', "%{$search}%")
                         ->orWhere('NAMA_LENGKAP', 'LIKE', "%{$search}%")
                         ->orWhere('email', 'LIKE', "%{$search}%")
                         ->orWhere('EMAIL', 'LIKE', "%{$search}%");
                  });
            });
        }
        $data_pesanan = $query->orderByDesc('id')->paginate(10)->withQueryString();
        return view('admin.pesanan.index', compact('data_pesanan'));
    }

    /**
     * Menampilkan detail pesanan.
     */
    public function showPesanan($id)
    {
        $pesanan = Pesanan::with(['pelanggan', 'pembayaran', 'pengiriman', 'detailPesanan.produk'])->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Update status pesanan.
     */
    public function updateStatusPesanan(Request $request, $id)
    {
        $request->validate(['status_pesanan' => 'required|string']);

        $pesanan = Pesanan::with('pelanggan')->findOrFail($id);
        $pesanan->STATUS_PESANAN = $request->status_pesanan;
        $pesanan->save();

        // Kirim notifikasi ke pelanggan
        try {
            $pelanggan = $pesanan->pelanggan;
            if ($pelanggan) {
                $statusMap = [
                    'Konfirmasi Pembayaran' => [
                        'icon'    => 'payments',
                        'color'   => '#10b981',
                        'title'   => '💳 Pembayaran Dikonfirmasi!',
                        'message' => 'Pembayaran untuk pesanan <strong>#ORD-' . $id . '</strong> telah <strong>dikonfirmasi</strong>. Pesanan Anda akan segera diproses.',
                    ],
                    'Dikonfirmasi' => [
                        'icon'    => 'check_circle',
                        'color'   => '#4edea3',
                        'title'   => '✅ Pesanan Dikonfirmasi!',
                        'message' => 'Pesanan <strong>#ORD-' . $id . '</strong> telah <strong>dikonfirmasi</strong> oleh admin. Pesanan Anda sedang diproses.',
                    ],
                    'Diproses' => [
                        'icon'    => 'inventory',
                        'color'   => '#fbbf24',
                        'title'   => '📦 Pesanan Sedang Diproses',
                        'message' => 'Pesanan <strong>#ORD-' . $id . '</strong> sedang <strong>dikemas</strong> oleh tim kami.',
                    ],
                    'Dikirim' => [
                        'icon'    => 'local_shipping',
                        'color'   => '#818cf8',
                        'title'   => '🚚 Pesanan Sedang Dikirim!',
                        'message' => 'Pesanan <strong>#ORD-' . $id . '</strong> telah <strong>dikirim</strong> dan sedang dalam perjalanan menuju Anda.',
                    ],
                    'Selesai' => [
                        'icon'    => 'verified',
                        'color'   => '#4edea3',
                        'title'   => '🎉 Pesanan Selesai!',
                        'message' => 'Pesanan <strong>#ORD-' . $id . '</strong> telah <strong>selesai</strong>. Terima kasih telah berbelanja di XDrew!',
                    ],
                    'Dibatalkan' => [
                        'icon'    => 'cancel',
                        'color'   => '#ff7676',
                        'title'   => '❌ Pesanan Dibatalkan',
                        'message' => 'Pesanan <strong>#ORD-' . $id . '</strong> telah <strong>dibatalkan</strong>. Hubungi kami jika ada pertanyaan.',
                    ],
                ];

                $info = $statusMap[$request->status_pesanan] ?? [
                    'icon'    => 'notifications',
                    'color'   => '#4edea3',
                    'title'   => 'Update Pesanan',
                    'message' => 'Status pesanan <strong>#ORD-' . $id . '</strong> diperbarui menjadi: <strong>' . $request->status_pesanan . '</strong>.',
                ];

                $pelanggan->notify(new SystemNotification(
                    $info['title'],
                    $info['message'],
                    $info['icon'],
                    $info['color'],
                    route('profile.pesanan')
                ));
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::warning('Gagal mengirim notifikasi status pesanan: ' . $e->getMessage());
        }

        return redirect()->route('admin.pesanan.show', $id)
            ->with('success', 'Status pesanan berhasil diperbarui menjadi: ' . $request->status_pesanan);
    }

    /**
     * Menghapus pesanan.
     */
    public function destroyPesanan($id)
    {
        $pesanan = Pesanan::where('ID', $id)->first();

        if (!$pesanan) {
            return redirect()->route('admin.pesanan')
                ->withErrors(['error' => 'Pesanan tidak ditemukan.']);
        }

        try {
            $pesanan_id = $pesanan->ID ?? $pesanan->id;
            Pesanan::where('ID', $id)->delete();

            return redirect()->route('admin.pesanan')
                ->with('success', 'Pesanan #ORD-' . $pesanan_id . ' berhasil dihapus secara permanen.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pesanan')
                ->withErrors(['error' => 'Gagal menghapus pesanan: ' . $e->getMessage()]);
        }
    }

    // ============================================================================
    // PELANGGAN
    // ============================================================================

    /**
     * Menampilkan daftar semua pelanggan.
     */
    public function pelanggan(Request $request)
    {
        $search = $request->query('search');
        $query = Pelanggan::query();
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                  ->orWhere('NAMA_LENGKAP', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('EMAIL', 'LIKE', "%{$search}%")
                  ->orWhere('nomor_telepon', 'LIKE', "%{$search}%")
                  ->orWhere('NOMOR_TELEPON', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('ALAMAT', 'LIKE', "%{$search}%");
            });
        }
        $data_pelanggan = $query->orderByDesc('id')->paginate(10)->withQueryString();
        return view('admin.pelanggan.index', compact('data_pelanggan'));
    }

    /**
     * Menampilkan detail pelanggan.
     */
    public function showPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.show', compact('pelanggan'));
    }

    // ============================================================================
    // ANALITIK
    // ============================================================================

    /**
     * Menampilkan halaman analitik dan laporan.
     */
    public function analitik()
    {
        $total_penjualan = (int)(Pesanan::sum('total_harga') ?? 0);
        $total_pesanan   = Pesanan::count();
        $total_pelanggan = Pelanggan::count();
        $total_produk    = Produk::count();

        // Data penjualan per bulan — Oracle compatible
        $chart_data = array_fill(0, 12, 0);
        try {
            $salesData = Pesanan::selectRaw(
                "EXTRACT(MONTH FROM tanggal_pesanan) as bulan, SUM(total_harga) as total"
            )
            ->whereRaw("EXTRACT(YEAR FROM tanggal_pesanan) = ?", [date('Y')])
            ->groupByRaw("EXTRACT(MONTH FROM tanggal_pesanan)")
            ->pluck('total', 'bulan');

            $monthlySales = array_fill(1, 12, 0);
            foreach ($salesData as $bulan => $total) {
                $monthlySales[(int)$bulan] = round($total / 1000000, 2);
            }
            $chart_data = array_values($monthlySales);
        } catch (\Exception $e) {
            // Jika query gagal, chart akan tampil kosong
        }

        // Produk terlaris
        $produk_terlaris = Produk::orderByDesc('stok')->first();
        $nama_terlaris   = $produk_terlaris
            ? ($produk_terlaris->getAttribute('nama_produk') ?? $produk_terlaris->NAMA_PRODUK ?? '-')
            : '-';

        return view('admin.analitik.index', compact(
            'total_penjualan', 'total_pesanan', 'total_pelanggan', 'total_produk',
            'chart_data', 'nama_terlaris'
        ));
    }
}