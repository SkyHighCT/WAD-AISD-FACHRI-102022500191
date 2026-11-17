<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penghuni', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('no_ktp', 20);
            $table->string('pekerjaan', 50);
            $table->string('no_kamar', 10);
            $table->string('kontak_darurat', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penghuni');
    }
};
