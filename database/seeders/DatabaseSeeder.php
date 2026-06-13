<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // A. Data Admin (Kini lengkap kembali!)
        DB::table('admin')->insert([
            'nama_admin' => 'Admin Utama',
            'email' => 'admin@xdrew.com',
            'kata_sandi' => Hash::make('admin123'),
            'nomor_telepon' => '08111222333',
            'hak_akses' => 'Super Admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // B. Data Pelanggan
        DB::table('pelanggan')->insert([
            'nama_lengkap' => 'Eko Pelanggan',
            'email' => 'eko@email.com',
            'kata_sandi' => Hash::make('pelanggan123'),
            'nomor_telepon' => '08999888777',
            'alamat' => 'Jl. Prawirokuat, Sleman, Yogyakarta',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // C. Data Produk
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Oversized Organic Tee',
                'kategori' => 'Kaos',
                'ukuran' => 'L',
                'warna' => 'Putih',
                'stok' => 50,
                'harga' => 699000,
                'status_produk' => 'Organik',
                'foto' => 'organic_tee.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama_produk' => 'Recycled Cargo Pants',
                'kategori' => 'Celana',
                'ukuran' => '32',
                'warna' => 'Hijau Army',
                'stok' => 35,
                'harga' => 1899000,
                'status_produk' => 'Daur Ulang',
                'foto' => 'cargo_pants.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);

        // D. Data Pesanan
        DB::table('pesanan')->insert([
            'id_pelanggan' => 1,
            'tanggal_pesanan' => $now->toDateString(),
            'status_pesanan' => 'Diproses',
            'total_harga' => 2598000,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // E. Data Pembayaran
        DB::table('pembayaran')->insert([
            'id_pesanan' => 1,
            'metode_bayar' => 'Transfer Bank',
            'status_bayar' => 'Lunas',
            'tanggal_bayar' => $now->toDateString(),
            'bukti_bayar' => 'bukti_tf_eko.jpg',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // F. Data Pengiriman
        DB::table('pengiriman')->insert([
            'id_pesanan' => 1,
            'alamat_tujuan' => 'Jl. Prawirokuat, Sleman, Yogyakarta',
            'kurir' => 'JNE Reguler',
            'nomor_resi' => 'JNE1234567890XD',
            'tanggal_kirim' => $now->addDay()->toDateString(),
            'status_kirim' => 'Dikirim',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // G. Data Detail Pesanan
        DB::table('detail_pesanan')->insert([
            [
                'id_pesanan' => 1,
                'id_produk' => 1,
                'kuantitas' => 1,
                'harga_satuan' => 699000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id_pesanan' => 1,
                'id_produk' => 2,
                'kuantitas' => 1,
                'harga_satuan' => 1899000,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}