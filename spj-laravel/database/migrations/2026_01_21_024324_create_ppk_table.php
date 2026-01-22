<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ppk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip', 20)->unique();
            $table->string('satker');
            $table->string('kdppk', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppk');
    }
};
