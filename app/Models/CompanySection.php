<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Menggunakan struktur Eloquent Model yang tepat

class CompanySection extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'title', 'subtitle', 'desc', 'image_1', 'image_2'];
}