<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan'); 
            $table->date('tanggal_pesanan');
            $table->string('status_pesanan', 50)->nullable();
            $table->integer('total_harga')->nullable();
            $table->timestamps();

            // Relasi ke tabel pelanggan
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};