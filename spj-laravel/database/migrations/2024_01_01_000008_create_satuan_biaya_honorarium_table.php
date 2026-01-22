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
        Schema::create('satuan_biaya_honorarium', function (Blueprint $table) {
            $table->id();
            $table->string('nama_honorium');
            $table->string('jabatan_level')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('harga_max_honorium')->nullable();
            $table->integer('harga_min_honorium')->nullable();
            $table->string('tahun_anggaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satuan_biaya_honorarium');
    }
};
