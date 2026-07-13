<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();              // Kunci unik pengenal seksi halaman
            $table->string('title')->nullable();          // Kolom B: Menampung Judul Utama
            $table->string('subtitle')->nullable();       // Menampung Subtitle Tambahan (Untuk kata 'HEALTHY')
            $table->text('desc')->nullable();             // Kolom C: Menampung Narasi Deskripsi Penuh
            $table->string('image_1')->nullable();        // Kolom D: Jalur File Gambar Utama ke-1
            $table->string('image_2')->nullable();        // Kolom D: Jalur File Gambar Pendukung ke-2
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_sections');
    }
};