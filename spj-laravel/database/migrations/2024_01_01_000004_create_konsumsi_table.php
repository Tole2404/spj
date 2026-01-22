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
        Schema::create('konsumsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->nullable()->constrained('kegiatans')->onDelete('cascade');
            $table->enum('kategori', ['snack', 'makanan'])->default('snack');
            $table->string('nama_konsumsi');
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
        Schema::dropIfExists('konsumsis');
    }
};
