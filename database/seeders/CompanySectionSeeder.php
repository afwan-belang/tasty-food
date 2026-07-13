<?php

namespace Database\Seeders;

use App\Models\CompanySection;
use Illuminate\Database\Seeder;

class CompanySectionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Komponen Hero Banner Beranda (Home)
        CompanySection::updateOrCreate(
            ['key' => 'home_hero'],
            [
                'title'    => 'TASTY FOOD',
                'subtitle' => 'HEALTHY',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex.',
                'image_1'  => 'asset/img-4-2000x2000.avif',
                'image_2'  => null
            ]
        );

        // 2. Komponen Halaman Tentang: Seksi Sejarah
        CompanySection::updateOrCreate(
            ['key' => 'about_sejarah'],
            [
                'title'    => 'TASTY FOOD',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
                'image_1'  => 'asset/brooke-lark-oaz0raysASk-unsplash.avif',
                'image_2'  => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.avif'
            ]
        );

        // 3. Komponen Halaman Tentang: Seksi Visi
        CompanySection::updateOrCreate(
            ['key' => 'about_visi'],
            [
                'title'    => 'VISI',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi.',
                'image_1'  => 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.avif',
                'image_2'  => 'asset/michele-blackwell-rAyCBQTH7ws-unsplash.avif'
            ]
        );

        // 4. Komponen Halaman Tentang: Seksi Misi
        CompanySection::updateOrCreate(
            ['key' => 'about_misi'],
            [
                'title'    => 'MISI',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi. In tempor imperdiet erat vel leo rutrum lobortis.',
                'image_1'  => 'asset/sanket-shah-SVA7TyHxojY-unsplash.avif',
                'image_2'  => null
            ]
        );
    }
}