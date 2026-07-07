<?php

namespace Database\Seeders; // Menggunakan huruf kapital

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            ['image' => 'asset/img-1.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'],
            ['image' => 'asset/img-2.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'],
            ['image' => 'asset/img-3.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'],
            ['image' => 'asset/img-4.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.']
        ];
        foreach ($cards as $c) {
            Food::create(array_merge($c, ['category' => 'card']));
        }

        $news = [
            ['image' => 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.avif', 'title' => 'APA SAJA MAKANAN KHAS NUSANTARA?', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum.'],
            ['image' => 'asset/sanket-shah-SVA7TyHxojY-unsplash.avif', 'title' => 'LOREM IPSUM 1', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'],
            ['image' => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.avif', 'title' => 'LOREM IPSUM 2', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'],
            ['image' => 'asset/jimmy-dean-Jvw3pxgeiZw-unsplash.avif', 'title' => 'LOREM IPSUM 3', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'],
            ['image' => 'asset/luisa-brimble-HvXEbkcXjSk-unsplash.avif', 'title' => 'LOREM IPSUM 4', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.']
        ];
        foreach ($news as $n) {
            Food::create(array_merge($n, ['category' => 'news']));
        }

        $gallery = [
            ['image' => 'asset/anh-nguyen-kcA-c3f_3FE-unsplash.avif', 'title' => 'Menu Utama 1', 'desc' => 'Detail Informasi Galeri Foto Kuliner 1'],
            ['image' => 'asset/anna-pelzer-IGfIGP5ONV0-unsplash.avif', 'title' => 'Menu Utama 2', 'desc' => 'Detail Informasi Galeri Foto Kuliner 2'],
            ['image' => 'asset/brooke-lark-1Rm9GLHV0UA-unsplash.avif', 'title' => 'Menu Utama 3', 'desc' => 'Detail Informasi Galeri Foto Kuliner 3'],
            ['image' => 'asset/brooke-lark-nBtmglfY0HU-unsplash.avif', 'title' => 'Menu Utama 4', 'desc' => 'Detail Informasi Galeri Foto Kuliner 4']
        ];
        foreach ($gallery as $g) {
            Food::create(array_merge($g, ['category' => 'gallery']));
        }
    }
}