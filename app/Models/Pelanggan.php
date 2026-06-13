<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    // 1. Arahkan ke nama tabel pelanggan Anda
    protected $table = 'pelanggan';

    // 2. Kolom apa saja yang bisa diisi (Mass Assignment)
    protected $fillable = [
        'nama_lengkap',
        'email',
        'kata_sandi',
        'nomor_telepon',
        'alamat',
        'bio', // <--- TAMBAHKAN INI
    ];

    // 3. Sembunyikan kata sandi
    protected $hidden = [
        'kata_sandi',
    ];

    // 4. Beritahu Laravel bahwa kolom password bernama 'kata_sandi'
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}