<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_pesanan'); 
            $table->text('alamat_tujuan')->nullable();
            $table->string('kurir', 50)->nullable();
            $table->string('nomor_resi', 100)->nullable();
            $table->date('tanggal_kirim')->nullable();
            $table->string('status_kirim', 50)->nullable();
            $table->timestamps();

            // Relasi ke tabel pesanan
            $table->foreign('id_pesanan')->references('id')->on('pesanan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
};