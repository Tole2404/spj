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
        Schema::table('waktu_konsumsi', function (Blueprint $table) {
            $table->enum('tipe', ['makan', 'snack'])->default('makan')->after('nama_waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('waktu_konsumsi', function (Blueprint $table) {
            $table->dropColumn('tipe');
        });
    }
};
