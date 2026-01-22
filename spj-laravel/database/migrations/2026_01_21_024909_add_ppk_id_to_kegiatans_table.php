<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->foreignId('ppk_id')->nullable()->after('mak_id')->constrained('ppk')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropForeign(['ppk_id']);
            $table->dropColumn('ppk_id');
        });
    }
};
