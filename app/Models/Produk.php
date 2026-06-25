<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $connection = 'oracle';
    protected $table      = 'PRODUK';
    protected $primaryKey = 'ID'; // Harus kapital untuk query Eloquent (Update/Delete/Find)

    public $incrementing  = true;
    protected $keyType    = 'int';
    public $timestamps    = true;

    /**
     * PENTING — Oracle PDO mengembalikan nama kolom dalam HURUF KECIL.
     * Fillable menggunakan nama kolom huruf kecil agar ->update() dan ->create() bekerja.
     * Controller cukup kirim key huruf kecil.
     */
    protected $fillable = [
        'nama_produk',
        'kategori',
        'ukuran',
        'warna',
        'stok',
        'harga',
        'status_produk',
        'foto',
        // Fallback huruf besar untuk kompatibilitas
        'NAMA_PRODUK',
        'KATEGORI',
        'UKURAN',
        'WARNA',
        'STOK',
        'HARGA',
        'STATUS_PRODUK',
        'FOTO',
    ];

    /**
     * Mencegah error jika ID ikut di-mass assign.
     * Oracle pakai Sequence/Trigger untuk ID otomatis.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            unset($model->id);
            unset($model->ID);
        });
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