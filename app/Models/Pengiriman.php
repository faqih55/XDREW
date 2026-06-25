<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    // Mengarahkan model untuk menggunakan koneksi Oracle
    protected $connection = 'oracle';

    // 1. Nama tabel wajib HURUF BESAR agar sinkron dengan Oracle
    protected $table = 'PENGIRIMAN';

    // 2. Primary Key di tabel Anda adalah 'ID' (berdasarkan screenshot)
    protected $primaryKey = 'ID';

    // 3. Wajib TRUE karena di screenshot skema Anda ada kolom CREATED_AT & UPDATED_AT
    public $timestamps = true;

    // 4. Fillable (Nama kolom WAJIB HURUF BESAR sesuai screenshot)
    protected $fillable = [
        'ID_PESANAN', 
        'ALAMAT_TUJUAN', 
        'KURIR', 
        'NOMOR_RESI', 
        'TANGGAL_KIRIM', 
        'STATUS_KIRIM'
    ];

    /**
     * RELASI
     * FK di tabel PENGIRIMAN adalah ID_PESANAN
     * PK di tabel PESANAN adalah ID
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id');
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