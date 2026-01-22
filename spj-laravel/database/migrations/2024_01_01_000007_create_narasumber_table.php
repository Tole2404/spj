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
        Schema::create('narasumber', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kegiatan')->nullable()->constrained('kegiatan')->onDelete('cascade');
            $table->foreignId('id_kwitansi_honorarium')->nullable()->constrained('kwitansi_honorarium')->onDelete('set null');
            $table->string('nama_konsumsi')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('harga')->nullable();
            $table->dateTime('tanggal_pembelian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narasumber');
    }
};
