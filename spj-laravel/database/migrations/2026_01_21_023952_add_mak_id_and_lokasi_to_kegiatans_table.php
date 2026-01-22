<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->foreignId('mak_id')->nullable()->after('unit_kerja_id')->constrained('mak')->onDelete('set null');
            $table->string('lokasi')->nullable()->after('jumlah_peserta');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropForeign(['mak_id']);
            $table->dropColumn('mak_id');
            $table->dropColumn('lokasi');
        });
    }
};
