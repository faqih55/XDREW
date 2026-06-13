<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $connection = 'oracle';

    protected $table = 'PRODUK';

    // PERBAIKAN 1: Nama kolom Primary Key di database Anda adalah ID (bukan ID_PRODUK)
    protected $primaryKey = 'ID';

    // Menandakan bahwa ID tidak bertambah otomatis (auto-increment). 
    // Catatan: Jika di Oracle Anda menggunakan Trigger/Sequence untuk ID otomatis, ubah ini menjadi true.
    public $incrementing = false; 

    // Menandakan ID bertipe integer
    protected $keyType = 'int'; 

    // PERBAIKAN 2: Di tabel Anda terdapat kolom CREATED_AT dan UPDATED_AT, jadi ini harus true.
    public $timestamps = true;

    // Menambahkan $guarded = [] sebagai tindakan pencegahan ekstra
    protected $guarded = [];

    // PERBAIKAN 3: Menyesuaikan $fillable dengan daftar kolom asli dari screenshot tabel Anda
    protected $fillable = [
        'ID', 
        'NAMA_PRODUK', 
        'KATEGORI', 
        'UKURAN', 
        'WARNA', 
        'STOK', 
        'HARGA',
        'STATUS_PRODUK',
        'FOTO'
    ];
}