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
        Schema::create('kwitansi_belanja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kegiatan')->nullable()->constrained('kegiatans')->onDelete('cascade');
            $table->string('nomor_kwitansi');
            $table->integer('jumlah')->nullable();
            $table->integer('harga')->nullable();
            $table->dateTime('tanggal_pembelian')->nullable();
            $table->enum('jenis_kwitansi', ['UP', 'LS'])->default('UP');
            $table->integer('total_biaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kwitansi_belanja');
    }
};
