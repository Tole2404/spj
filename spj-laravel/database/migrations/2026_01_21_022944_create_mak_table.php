<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mak', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->string('nama');
            $table->string('kode')->unique();
            $table->string('satker');
            $table->string('akun');
            $table->string('paket');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mak');
    }
};
