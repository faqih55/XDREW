<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_pesanan'); 
            $table->string('metode_bayar', 50)->nullable();
            $table->string('status_bayar', 50)->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->string('bukti_bayar', 255)->nullable();
            $table->timestamps();

            // Relasi ke tabel pesanan
            $table->foreign('id_pesanan')->references('id')->on('pesanan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};