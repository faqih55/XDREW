<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel di database Anda
    protected $table = 'pesanan';

    // Menambahkan field yang diperlukan untuk checkout
    protected $fillable = [
        'pelanggan_id',
        'total_harga',
        'status',
        'nama_penerima', // Wajib ditambahkan
        'alamat',        // Wajib ditambahkan
    ];

    // RELASI: Satu Pesanan milik satu Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // RELASI: Satu Pesanan memiliki banyak Detail_Pesanan
    public function details()
    {
        return $this->hasMany(Detail_Pesanan::class, 'pesanan_id');
    }
}