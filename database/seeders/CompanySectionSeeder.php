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

        // 2. Komponen Seksi Tentang Kami di Halaman Beranda (Home About)
        CompanySection::updateOrCreate(
            ['key' => 'home_about'],
            [
                'title'    => 'Tentang Kami',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
                'image_1'  => null,
                'image_2'  => null
            ]
        );

        // INDUK DATA KONTAK: Menjamin ketersediaan awal baris data pengunci contact_info
        CompanySection::updateOrCreate(
            ['key' => 'contact_info'],
            [
                'title'    => 'tastyfood@gmail.com',      // Berfungsi menampung EMAIL
                'subtitle' => '+62 812 3456 7890',      // Berfungsi menampung PHONE
                'desc'     => 'Kota Bandung, Jawa Barat', // Berfungsi menampung LOCATION
                'image_1'  => null,
                'image_2'  => null
            ]
        );

        // ✅ 4. BARU: Komponen Pengunci Teks Branding Logo Navbar Beranda
        CompanySection::updateOrCreate(
            ['key' => 'site_branding'],
            [
                'title'    => 'TASTY FOOD',
                'subtitle' => null,
                'desc'     => 'branding',
                'image_1'  => null,
                'image_2'  => null
            ]
        );

        CompanySection::updateOrCreate(
            ['key' => 'home_texture'],
            [
                'title'    => 'texture',
                'subtitle' => null,
                'desc'     => 'texture',
                'image_1'  => 'asset/Group 70@2x.avif',
                'image_2'  => null
            ]
        );

        // 6. Komponen Halaman Tentang: Seksi Sejarah
        CompanySection::updateOrCreate(
            ['key' => 'about_sejarah'],
            [
                'title'    => 'TASTY FOOD',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
                'image_1'  => 'asset/brooke-lark-oaz0raysASk-unsplash.avif',
                'image_2'  => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.avif'
            ]
        );

        CompanySection::updateOrCreate(
            ['key' => 'about_visi'],
            [
                'title'    => 'VISI',
                'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi.',
                'image_1'  => 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.avif',
                'image_2'  => 'asset/michele-blackwell-rAyCBQTH7ws-unsplash.avif'
            ]
        );

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