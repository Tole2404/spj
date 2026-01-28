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
        Schema::table('narasumbers', function (Blueprint $table) {
            $table->enum('status', ['draft', 'final'])->default('final')->after('honorarium_netto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('narasumbers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
