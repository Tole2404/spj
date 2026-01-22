<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            // Add new columns
            if (!Schema::hasColumn('kegiatans', 'provinsi_id')) {
                $table->foreignId('provinsi_id')->nullable()->after('jumlah_peserta')
                    ->constrained('satuan_biaya_konsumsi_provinsi')->onDelete('set null');
            }

            if (!Schema::hasColumn('kegiatans', 'detail_lokasi')) {
                $table->string('detail_lokasi')->nullable()->after('provinsi_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            if (Schema::hasColumn('kegiatans', 'provinsi_id')) {
                $table->dropForeign(['provinsi_id']);
                $table->dropColumn('provinsi_id');
            }
            if (Schema::hasColumn('kegiatans', 'detail_lokasi')) {
                $table->dropColumn('detail_lokasi');
            }
        });
    }
};
