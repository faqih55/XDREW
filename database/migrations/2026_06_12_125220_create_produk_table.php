<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_produk', 100);
            $table->string('kategori', 50)->nullable();
            $table->string('ukuran', 20)->nullable();
            $table->string('warna', 20)->nullable();
            $table->integer('stok')->default(0);
            $table->integer('harga');
            $table->string('status_produk', 20)->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};