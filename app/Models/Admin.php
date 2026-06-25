<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Mengarahkan model untuk menggunakan koneksi Oracle
    protected $connection = 'oracle';

    // 1. Arahkan ke nama tabel yang benar di database (Oracle membaca secara KAPITAL)
    protected $table = 'ADMIN';

    // 2. SANGAT PENTING: Tentukan Primary Key agar Sesi Login stabil
    protected $primaryKey = 'ID'; 

    // 3. Kolom yang boleh diisi (Gunakan HURUF BESAR menyesuaikan Oracle)
    protected $fillable = [
        'NAMA_ADMIN',
        'EMAIL',
        'KATA_SANDI',
    ];

    // 4. Sembunyikan dari respons array demi keamanan
    protected $hidden = [
        'KATA_SANDI',
        'kata_sandi', // Menutupi format kecil untuk jaga-jaga
        'remember_token',
    ];

    // CATATAN: Jika tabel ADMIN Anda di Oracle TIDAK memiliki kolom CREATED_AT dan UPDATED_AT,
    // hapus tanda komentar (//) pada baris di bawah ini agar tidak terjadi error saat menambah data:
    public $timestamps = false;

    // 5. Jembatan untuk memberitahu Laravel bahwa kolom password bernama KATA_SANDI
    public function getAuthPassword()
    {
        // Oracle PDO mengembalikan kolom dalam huruf kecil, prioritaskan itu
        return $this->getAttribute('kata_sandi') 
            ?? $this->getAttribute('KATA_SANDI');
    }

    // =====================================================================
    // 6. PELINDUNG SESI ORACLE (Mencegah ter-logout otomatis)
    // =====================================================================
    public function getAuthIdentifierName()
    {
        return $this->primaryKey;
    }

    public function getAuthIdentifier()
    {
        // Oracle PDO mengembalikan kolom dalam huruf kecil
        return $this->getAttribute('id') 
            ?? $this->getAttribute('ID');
    }

    /**
     * Disable remember token for Oracle compatibility since the table does not have remember_token
     */
    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
        return '';
    }
}