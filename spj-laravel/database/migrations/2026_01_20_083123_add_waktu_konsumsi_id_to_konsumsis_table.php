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
        Schema::table('konsumsis', function (Blueprint $table) {
            $table->foreignId('waktu_konsumsi_id')->nullable()->after('kategori')->constrained('waktu_konsumsi')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('konsumsis', function (Blueprint $table) {
            $table->dropForeign(['waktu_konsumsi_id']);
            $table->dropColumn('waktu_konsumsi_id');
        });
    }
};
