<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('image');             // Tempat menyimpan path file gambar (contoh: storage/foods/namafile.avif)
            $table->string('title');             // Nama makanan atau judul berita
            $table->text('desc');                // Informasi detail makanan atau deskripsi isi berita
            $table->enum('category', ['card', 'news', 'gallery']); // Pembeda letak display komponen di halaman web
            $table->timestamps();                // Otomatis membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};