<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_pesanan'); 
            $table->unsignedBigInteger('id_produk'); 
            $table->integer('kuantitas');
            $table->integer('harga_satuan');
            $table->timestamps();

            // Relasi ke tabel pesanan dan produk
            $table->foreign('id_pesanan')->references('id')->on('pesanan')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_pesanan');
    }
};