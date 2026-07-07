<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * Mendefinisikan nama tabel secara eksplisit (Good Practice).
     */
    protected $table = 'foods';

    /**
     * Kolom yang diizinkan untuk diisi secara massal (Mass Assignment).
     * Melindungi database dari serangan injection data ilegal dari luar.
     */
    protected $fillable = [
        'image',
        'title',
        'desc',
        'category',
    ];
}