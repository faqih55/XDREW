<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_admin', 100);
            $table->string('email', 100)->unique();
            $table->string('kata_sandi', 255); // Kolom ini yang dicari terminal!
            $table->string('nomor_telepon', 15)->nullable();
            $table->string('hak_akses', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
};