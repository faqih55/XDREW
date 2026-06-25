<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Mengarahkan model untuk menggunakan koneksi Oracle
    protected $connection = 'oracle';

    // Nama tabel di Oracle (Wajib HURUF BESAR)
    protected $table = 'PESANAN'; 

    // Primary Key (Wajib 'ID' sesuai skema yang Anda miliki)
    protected $primaryKey = 'ID'; 

    // Konfigurasi ID agar Laravel tahu bahwa ini auto-increment
    public $incrementing = true;
    protected $keyType = 'int';

    // Aktifkan timestamps karena tabel Anda memiliki CREATED_AT & UPDATED_AT
    public $timestamps = true; 

    // Daftar kolom yang diizinkan untuk diisi massal
    protected $fillable = [
        'ID_PELANGGAN',
        'TANGGAL_PESANAN',
        'STATUS_PESANAN',
        'TOTAL_HARGA'
    ];

    /**
     * RELASI
     * Pastikan semua Foreign Key menggunakan nama kolom yang benar: 'ID_PESANAN'
     */

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pesanan', 'id');
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_pesanan', 'id');
    }

    /**
     * SANGAT PENTING UNTUK ORACLE:
     * Oracle PDO mengembalikan nama kolom dalam huruf KECIL.
     * Jembatan alias dari 'ID' (yang dicari Eloquent) ke 'id' (yang dikembalikan PDO).
     */
    public function getAttribute($key)
    {
        if (strtoupper($key) === 'ID') {
            return parent::getAttribute('id') ?? parent::getAttribute('ID');
        }
        return parent::getAttribute($key);
    }
}