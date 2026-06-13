<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_Pesanan extends Model
{
    // Menggunakan nama tabel secara eksplisit karena ada underscore
    protected $table = 'detail_pesanans'; 
    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah', 'harga'];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}