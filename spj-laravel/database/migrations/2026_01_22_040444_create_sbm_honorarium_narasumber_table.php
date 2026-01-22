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
        Schema::create('sbm_honorarium_narasumber', function (Blueprint $table) {
            $table->id();
            $table->string('golongan_jabatan'); // Menteri, Eselon I, II, III, Moderator, Pembawa Acara, Panitia
            $table->integer('tarif_honorarium'); // Max tarif honorarium
            $table->year('tahun_anggaran')->default(2024);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sbm_honorarium_narasumber');
    }
};
