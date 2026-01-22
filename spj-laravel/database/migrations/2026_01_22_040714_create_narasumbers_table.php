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
        Schema::create('narasumbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained()->onDelete('cascade');
            $table->string('nama_narasumber');
            $table->enum('jenis', ['narasumber', 'moderator', 'pembawa_acara', 'panitia']);
            $table->string('golongan_jabatan'); // FK to sbm_honorarium_narasumber
            $table->string('npwp')->nullable();
            $table->enum('tarif_pph21', ['0', '5', '6', '15'])->default('5'); // Persentase pajak
            $table->integer('honorarium_bruto'); // Sebelum pajak
            $table->integer('pph21')->default(0); // Nilai pajak dipotong
            $table->integer('honorarium_netto'); // Setelah pajak (yang diterima)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narasumbers');
    }
};
