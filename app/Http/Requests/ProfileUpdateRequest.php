<?php

namespace App\Http\Requests;

use App\Models\Pelanggan; // Pastikan menggunakan model Pelanggan
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // Gunakan 'nama_lengkap' sesuai kolom di database kamu
            'nama_lengkap' => ['required', 'string', 'max:255'], 
            
            // Gunakan Pelanggan::class untuk aturan unique
            'email' => [
                'required', 
                'email', 
                'max:255', 
                Rule::unique(Pelanggan::class)->ignore($this->user()->id)
            ],
            
            // Tambahkan bio agar bisa divalidasi
            'bio' => ['nullable', 'string', 'max:500'], 
        ];
    }
}