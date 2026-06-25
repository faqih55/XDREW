<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Mengarahkan model untuk menggunakan koneksi Oracle
    protected $connection = 'oracle';

    // 1. Nama tabel wajib HURUF BESAR sesuai skema Oracle
    protected $table = 'PEMBAYARAN';

    // 2. KUNCI PERBAIKAN: Beritahu Laravel bahwa Primary Key-nya adalah 'ID'
    protected $primaryKey = 'ID';

    // 3. Pastikan timestamps aktif agar Laravel otomatis menangani CREATED_AT/UPDATED_AT
    public $timestamps = true;

    // 4. Fillable (Nama kolom WAJIB HURUF BESAR sesuai screenshot skema Anda)
    protected $fillable = [
        'ID_PESANAN', 
        'METODE_BAYAR', 
        'STATUS_BAYAR', 
        'TANGGAL_BAYAR',
        'BUKTI_BAYAR'
    ];

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