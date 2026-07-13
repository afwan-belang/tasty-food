<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Impor helper pembuat slug tulisan

class Food extends Model
{
    use HasFactory;

    /**
     * Mendefinisikan nama tabel secara eksplisit (Good Practice).
     */
    protected $table = 'foods';

    /**
     * Kolom yang diizinkan untuk diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'image',
        'title',
        'slug', // ✅ TAMBAHAN: Diizinkan mass-assignment
        'desc',
        'category',
    ];

    /**
     * ✅ ENGINE OTOMATIS SLUG GENERATOR (MENCEGAH DUPLIKASI DAN DATA CRASH)
     */
    protected static function booted()
    {
        static::saving(function ($food) {
            if ($food->category === 'news') {
                $slug = Str::slug($food->title);
                $originalSlug = $slug;
                $count = 1;

                // Loop Pengaman: Jika ada judul berita yang kembar, otomatis ditambahkan angka (-1, -2, dst)
                while (self::where('slug', $slug)->where('id', '!=', $food->id)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
                $food->slug = $slug;
            } else {
                // Untuk kategori non-news (seperti card 'LOREM IPSUM' yang judulnya berulang), 
                // ditambahkan kode acak di belakangnya agar terhindar dari error data crash unique constraint
                $food->slug = Str::slug($food->title) . '-' . sprintf('%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff));
            }
        });
    }
}