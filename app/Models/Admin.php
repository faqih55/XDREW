<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // 1. Arahkan ke nama tabel yang benar di database
    protected $table = 'admin';

    // 2. Kolom yang boleh diisi
    protected $fillable = [
        'nama_admin',
        'email',
        'kata_sandi',
    ];

    // 3. Sembunyikan kata sandi untuk keamanan
    protected $hidden = [
        'kata_sandi',
    ];

    // 4. Set custom password column name untuk authentication
    public function getAuthPasswordName()
    {
        return 'kata_sandi';
    }

    // 5. Jembatan untuk memberitahu Laravel bahwa kolom password bernama 'kata_sandi'
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}