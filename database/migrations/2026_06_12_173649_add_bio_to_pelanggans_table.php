<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pastikan nama tabel di sini sama persis dengan yang ada di database
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->text('bio')->nullable(); // Menambahkan kolom bio yang bisa dikosongkan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn('bio'); // Menghapus kolom jika migrasi di-rollback
        });
    }
};