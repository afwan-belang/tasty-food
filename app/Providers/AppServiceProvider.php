<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanySection; // Memanggil model seksi dinamis
use Illuminate\Support\Facades\View; // Memanggil fasad View Composer global

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // REGISTRASI VIEW COMPOSER GLOBAL FOOTER
        View::composer('components.layout.footer', function ($view) {
            $footerContact = CompanySection::where('key', 'contact_info')->first();
            $view->with('footerContact', $footerContact);
        });

        // ✅ REGISTRASI VIEW COMPOSER GLOBAL BRANDING & MENU NAVIGASI: Menyuntikkan data logo & label menu ke seluruh view publik
        View::composer('*', function ($view) {
            $siteBranding = CompanySection::where('key', 'site_branding')->first();
            $navMenuRecord = CompanySection::where('key', 'nav_menu')->first();

            // Memecah nilai string desc ('BERITA|GALERI|KONTAK') menjadi array terpisah yang aman
            $descParts = explode('|', $navMenuRecord->desc ?? 'BERITA|GALERI|KONTAK');

            $navMenu = (object) [
                'home'    => $navMenuRecord->title ?? 'HOME',
                'tentang' => $navMenuRecord->subtitle ?? 'TENTANG',
                'berita'  => $descParts[0] ?? 'BERITA',
                'galeri'  => $descParts[1] ?? 'GALERI',
                'kontak'  => $descParts[2] ?? 'KONTAK',
            ];

            $view->with('siteBranding', $siteBranding)->with('navMenu', $navMenu);
        });
    }
}