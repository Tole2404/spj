<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('satuan_biaya_konsumsi_provinsi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_provinsi'); // 0 untuk nasional, 1-38 untuk provinsi
            $table->string('nama_provinsi'); // Nama provinsi
            $table->string('satuan');
            $table->integer('harga_max_makan');
            $table->integer('harga_max_snack');
            $table->year('tahun_anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satuan_biaya_konsumsi_provinsi');
    }
};
