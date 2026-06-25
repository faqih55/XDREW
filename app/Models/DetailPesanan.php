<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    // 1. Nama tabel wajib HURUF BESAR agar sinkron dengan Oracle
    protected $table = 'DETAIL_PESANAN';

    // 2. Primary key sesuai skema database
    protected $primaryKey = 'ID';

    // 3. Timestamps true karena di skema Anda terdapat CREATED_AT & UPDATED_AT
    public $timestamps = true;

    // 4. KOLOM WAJIB HURUF BESAR: Sesuaikan dengan nama kolom hasil DESC
    protected $fillable = [
        'ID_PESANAN',   // Perbaikan: Di schema Anda ini ID_PESANAN
        'ID_PRODUK', 
        'KUANTITAS', 
        'HARGA_SATUAN',
        'CREATED_AT',
        'UPDATED_AT'
    ];

    /**
     * RELASI
     * Pastikan foreign key di sini sama persis dengan nama kolom di database.
     */

    // Detail ini milik satu Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id');
    }

    // Detail ini merujuk pada satu Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id'); 
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
