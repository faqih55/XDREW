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
     * Memproses data checkout ke dalam database Oracle
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

        // 1.5 Cek apakah ada barang yang dipesan (Dari Keranjang atau Beli Langsung)
        $cart = session('cart', []);
        $isSingleProduct = ($request->filled('produk_id') && $request->produk_id !== 'null' && $request->is_beli_langsung == 'true');

        if (!$isSingleProduct && empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang belanja Anda kosong.'], 400);
        }

        // Ambil nama produk pertama untuk deskripsi pesanan / notifikasi
        $firstProductName = 'Produk XDrew';
        $extraCount = 0;
        
        if ($isSingleProduct) {
            $idProduk = explode('-', $request->produk_id)[0];
            $prod = \App\Models\Produk::find($idProduk);
            if ($prod) {
                $firstProductName = $prod->nama_produk ?? $prod->NAMA_PRODUK ?? 'Produk';
            }
        } else {
            $cartItems = array_values($cart);
            if (!empty($cartItems)) {
                $firstItem = $cartItems[0];
                $firstProductName = $firstItem['nama_produk'] ?? $firstItem['NAMA_PRODUK'] ?? 'Produk';
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

            // Menggunakan getKey() jauh lebih aman untuk Oracle dibanding ->ID
            $pesanan_id = $pesanan->getKey(); 

            // 3. Simpan Item Pesanan
                if ($isSingleProduct) {
                    // Bersihkan ID: Ambil bagian sebelum tanda '-' (misal '5-XL' menjadi '5')
                    $idProduk = explode('-', $request->produk_id)[0];
                    
                    DetailPesanan::create([
                        'ID_PESANAN'   => $pesanan_id, 
                        'ID_PRODUK'    => $idProduk, // Gunakan ID yang sudah bersih
                        'KUANTITAS'    => $request->jumlah,
                        'HARGA_SATUAN' => ($request->total_pembayaran / $request->jumlah) 
                    ]);
                } else {
                    foreach ($cart as $id => $item) {
                        // Bersihkan ID: Ambil bagian sebelum tanda '-'
                        $idProduk = explode('-', $id)[0];
                        
                        DetailPesanan::create([
                            'ID_PESANAN'   => $pesanan_id,
                            'ID_PRODUK'    => $idProduk, // Gunakan ID yang sudah bersih
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

            // Sync/update profile shipping address in database
            $user = Auth::guard('pelanggan')->user();
            if ($user) {
                $user->NOMOR_TELEPON = $request->nomor_telepon;
                $user->PROVINSI = $request->provinsi;
                $user->KOTA = $request->kota;
                $user->ALAMAT = $request->alamat_lengkap;
                $user->save();
            }

            DB::commit();

            // Kirim notifikasi ke pelanggan & admin
            try {
                $user = Auth::guard('pelanggan')->user();
                if ($user) {
                    $user->notify(new SystemNotification(
                        $namaPesanan . ' — #ORD-' . $pesanan_id,
                        'Pesanan senilai <strong>Rp ' . number_format($request->total_pembayaran, 0, ',', '.') . '</strong> sedang diproses. Silakan lakukan pembayaran.',
                        'shopping_bag',
                        '#4edea3',
                        route('checkout.pesanan.show', $pesanan_id)
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
                            route('admin.pesanan.show', $pesanan_id)
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
     * Menampilkan halaman Invoice / Detail Pesanan setelah berhasil checkout
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['detailPesanan.produk', 'pembayaran', 'pengiriman'])->findOrFail($id);
        return view('detail-pesanan', compact('pesanan')); // Pastikan Anda memiliki file resources/views/detail-pesanan.blade.php
    }

    /**
     * Menampilkan halaman Lacak Pesanan
     */
    public function lacak($id)
    {
        $pesanan = Pesanan::with(['detailPesanan.produk', 'pembayaran', 'pengiriman'])->findOrFail($id);
        
        // Proteksi kepemilikan pesanan
        $idPelanggan = $pesanan->id_pelanggan ?? $pesanan->ID_PELANGGAN;
        if ($idPelanggan != Auth::guard('pelanggan')->id()) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        return view('lacak.show', compact('pesanan'));
    }
}