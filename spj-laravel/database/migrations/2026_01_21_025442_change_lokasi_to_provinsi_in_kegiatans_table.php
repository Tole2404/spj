<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            // Rename lokasi to detail_lokasi
            $table->renameColumn('lokasi', 'detail_lokasi');

            // Add provinsi_id foreign key
            $table->foreignId('provinsi_id')->nullable()->after('lokasi')
                ->constrained('satuan_biaya_konsumsi_provinsi')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropForeign(['provinsi_id']);
            $table->dropColumn('provinsi_id');
            $table->renameColumn('detail_lokasi', 'lokasi');
        });
    }
};
