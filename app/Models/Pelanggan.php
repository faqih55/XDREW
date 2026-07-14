<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    // Mengarahkan model untuk menggunakan koneksi Oracle
    protected $connection = 'oracle';
    
    protected $table = 'PELANGGAN';
    
    // Pastikan di database Oracle Anda, kolom primary key-nya benar-benar bernama 'ID'
    protected $primaryKey = 'ID'; 
    
    // Jika kolom ID Anda menggunakan tipe data VARCHAR/String (bukan angka/integer), 
    // hapus tanda komentar (//) pada dua baris di bawah ini:
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'NAMA_LENGKAP',
        'EMAIL',
        'KATA_SANDI',
        'NOMOR_TELEPON',
        'ALAMAT',
        'BIO',
        'PROVINSI',
        'KOTA',
        'KABUPATEN',
        'FOTO',
        'REMEMBER_TOKEN',
        'CREATED_AT',
        'UPDATED_AT',
    ];

    // DIPERBAIKI: Harus sama persis (kapital) dengan yang ada di database & fillable
    protected $hidden = [
        'KATA_SANDI',
        'REMEMBER_TOKEN',
    ];

    protected $rememberTokenName = '';

    /**
     * Beritahu Laravel kolom mana yang digunakan untuk Password.
     * PENTING: Oracle PDO mengembalikan nama kolom dalam huruf KECIL,
     * sehingga kita harus cek dua kemungkinan: 'kata_sandi' dan 'KATA_SANDI'.
     */
    public function getAuthPassword()
    {
        return $this->getAttribute('kata_sandi') 
            ?? $this->getAttribute('KATA_SANDI');
    }

    /**
     * Beritahu Laravel kolom mana yang digunakan untuk Primary Key Sesi
     */
    public function getAuthIdentifierName()
    {
        return 'ID';
    }

    /**
     * SANGAT PENTING UNTUK ORACLE:
     * Oracle PDO mengembalikan nama kolom dalam huruf KECIL.
     * Alias 'ID' ke 'id'.
     */
    public function getAttribute($key)
    {
        if (strtoupper($key) === 'ID') {
            return parent::getAttribute('id') ?? parent::getAttribute('ID');
        }
        return parent::getAttribute($key);
    }

    public function getAuthIdentifier()
    {
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