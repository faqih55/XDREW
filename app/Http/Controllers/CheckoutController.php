<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Notifications\SystemNotification;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman pembayaran (Checkout)
     */
    public function index(Request $request)
    {
        return view('pembayaran');
    }

    /**
     * Memproses data checkout ke dalam database
     */
    public function process(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'nama_penerima'    => 'required|string|max:255',
            'nomor_telepon'    => 'required|string|max:20',
            'provinsi'         => 'required|string',
            'kota'             => 'required|string',
            'alamat_lengkap'   => 'required|string',
            'metode_pembayaran'=> 'required|string',
            'total_pembayaran' => 'required|numeric',
        ]);

        // 1.5 Cek apakah ada barang yang dipesan
        $cart = session('cart', []);
        $isSingleProduct = ($request->filled('produk_id') && $request->produk_id !== 'null' && $request->is_beli_langsung == 'true');

        if (!$isSingleProduct && empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang belanja Anda kosong.'], 400);
        }

        // Ambil nama & foto produk pertama untuk notifikasi
        $firstProductName = 'Produk XDrew';
        $firstProductImage = null; 
        $extraCount = 0;
        
        if ($isSingleProduct) {
            $idProduk = explode('-', $request->produk_id)[0];
            $prod = \App\Models\Produk::find($idProduk);
            if ($prod) {
                $firstProductName = $prod->nama_produk ?? $prod->NAMA_PRODUK ?? 'Produk';
                // PENCARIAN FOTO EKSTRA AMAN: Mencakup semua variasi nama kolom
                $firstProductImage = $prod->foto_produk ?? $prod->FOTO_PRODUK ?? $prod->gambar ?? $prod->GAMBAR ?? $prod->foto ?? $prod->FOTO ?? $prod->gambar_produk ?? $prod->GAMBAR_PRODUK ?? null; 
            }
        } else {
            $cartItems = array_values($cart);
            if (!empty($cartItems)) {
                $firstItem = $cartItems[0];
                $firstProductName = $firstItem['nama_produk'] ?? $firstItem['NAMA_PRODUK'] ?? 'Produk';
                // PENCARIAN FOTO DI KERANJANG
                $firstProductImage = $firstItem['foto'] ?? $firstItem['FOTO'] ?? $firstItem['gambar'] ?? $firstItem['GAMBAR'] ?? $firstItem['foto_produk'] ?? $firstItem['FOTO_PRODUK'] ?? null; 
                $extraCount = count($cartItems) - 1;
            }
        }
        
        $namaPesanan = $firstProductName;
        if ($extraCount > 0) {
            $namaPesanan .= ' (+ ' . $extraCount . ' produk lainnya)';
        }

        DB::beginTransaction();

        try {
            // 2. Simpan Pesanan Utama
            $pesanan = Pesanan::create([
                'ID_PELANGGAN'    => Auth::guard('pelanggan')->id(),
                'TANGGAL_PESANAN' => now(),
                'TOTAL_HARGA'     => $request->total_pembayaran,
                'STATUS_PESANAN'  => 'Pending'
            ]);

            $pesanan_id = $pesanan->getKey(); 

            // 3. Simpan Item Pesanan
            if ($isSingleProduct) {
                $idProduk = explode('-', $request->produk_id)[0];
                
                DetailPesanan::create([
                    'ID_PESANAN'   => $pesanan_id, 
                    'ID_PRODUK'    => $idProduk, 
                    'KUANTITAS'    => $request->jumlah,
                    'HARGA_SATUAN' => ($request->total_pembayaran / $request->jumlah) 
                ]);
            } else {
                foreach ($cart as $id => $item) {
                    $idProduk = explode('-', $id)[0];
                    
                    DetailPesanan::create([
                        'ID_PESANAN'   => $pesanan_id,
                        'ID_PRODUK'    => $idProduk, 
                        'KUANTITAS'    => $item['jumlah'] ?? $item['KUANTITAS'] ?? 1,
                        'HARGA_SATUAN' => $item['harga'] ?? $item['HARGA'] ?? 0
                    ]);
                }
                session()->forget('cart');
            }

            // 4. Simpan Data Pengiriman
            $alamat_tujuan = $request->alamat_lengkap . ', ' . $request->kota . ', ' . $request->provinsi . 
                             ' (Penerima: ' . $request->nama_penerima . ' - ' . $request->nomor_telepon . ')';

            Pengiriman::create([
                'ID_PESANAN'    => $pesanan_id,
                'ALAMAT_TUJUAN' => $alamat_tujuan,
                'STATUS_KIRIM'  => 'Menunggu Diproses'
            ]);

            // 5. Simpan Data Pembayaran
            Pembayaran::create([
                'ID_PESANAN'    => $pesanan_id,
                'METODE_BAYAR'  => $request->metode_pembayaran,
                'STATUS_BAYAR'  => 'Menunggu Pembayaran',
                'TANGGAL_BAYAR' => now()
            ]);

            // Sync/update profile shipping address
            $user = Auth::guard('pelanggan')->user();
            if ($user) {
                $user->NOMOR_TELEPON = $request->nomor_telepon;
                $user->PROVINSI = $request->provinsi;
                $user->KOTA = $request->kota;
                $user->ALAMAT = $request->alamat_lengkap;
                $user->save();
            }

            DB::commit();

            // 6. Kirim notifikasi ke pelanggan & admin (DENGAN GAMBAR PRODUK)
            try {
                if ($user) {
                    $user->notify(new SystemNotification(
                        $namaPesanan . ' — #ORD-' . $pesanan_id,
                        'Pesanan senilai <strong>Rp ' . number_format($request->total_pembayaran, 0, ',', '.') . '</strong> sedang diproses. Silakan lakukan pembayaran.',
                        'shopping_bag',
                        '#4edea3',
                        route('checkout.pesanan.show', $pesanan_id),
                        $firstProductImage // GAMBAR DIKIRIM KE SINI
                    ));
                    
                    // Notifikasi ke admin
                    $admins = \App\Models\Admin::all();
                    $custName = $user->getAttribute('nama_lengkap') ?? $user->getAttribute('NAMA_LENGKAP') ?? 'Pelanggan';
                    foreach ($admins as $adm) {
                        $adm->notify(new SystemNotification(
                            $namaPesanan . ' — #ORD-' . $pesanan_id,
                            'Pelanggan <strong>' . $custName . '</strong> telah membuat pesanan senilai <strong>Rp ' . number_format($request->total_pembayaran, 0, ',', '.') . '</strong>.',
                            'shopping_bag',
                            '#10b981',
                            route('admin.pesanan.show', $pesanan_id),
                            $firstProductImage // GAMBAR DIKIRIM KE SINI
                        ));
                    }
                }
            } catch (\Exception $notifErr) {
                Log::warning('Gagal mengirim notifikasi checkout: ' . $notifErr->getMessage());
            }

            return response()->json([
                'success'  => true,
                'redirect' => route('checkout.pesanan.show', $pesanan_id)
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses checkout: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan halaman Invoice / Detail Pesanan
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['detailPesanan.produk', 'pembayaran', 'pengiriman'])->findOrFail($id);
        return view('detail-pesanan', compact('pesanan'));
    }

    /**
     * Menampilkan halaman Lacak Pesanan
     */
    public function lacak($id)
    {
        $pesanan = Pesanan::with(['detailPesanan.produk', 'pembayaran', 'pengiriman'])->findOrFail($id);
        
        $idPelanggan = $pesanan->id_pelanggan ?? $pesanan->ID_PELANGGAN;
        if ($idPelanggan != Auth::guard('pelanggan')->id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        return view('lacak.show', compact('pesanan'));
    }
}