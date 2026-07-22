<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanySection; // Memanggil model seksi dinamis
use App\Models\Message;        // Memanggil model pesan pengunjung
use Illuminate\Support\Facades\View; // Memanggil fasad View Composer global
use Illuminate\Support\Facades\Schema; // Fasad pengecekan skema database

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

        // ✅ REGISTRASI VIEW COMPOSER GLOBAL BRANDING, NAV MENU, & UNREAD INBOX BADGE
        View::composer('*', function ($view) {
            $siteBranding = CompanySection::where('key', 'site_branding')->first();
            $navMenuRecord = CompanySection::where('key', 'nav_menu')->first();

            $descParts = explode('|', $navMenuRecord->desc ?? 'BERITA|GALERI|KONTAK');

            $navMenu = (object) [
                'home'    => $navMenuRecord->title ?? 'HOME',
                'tentang' => $navMenuRecord->subtitle ?? 'TENTANG',
                'berita'  => $descParts[0] ?? 'BERITA',
                'galeri'  => $descParts[1] ?? 'GALERI',
                'kontak'  => $descParts[2] ?? 'KONTAK',
            ];

            // Pengecekan aman ketersediaan tabel messages sebelum menghitung badge
            $unreadMessagesCount = Schema::hasTable('messages') ? Message::where('is_read', false)->count() : 0;

            $view->with('siteBranding', $siteBranding)
                 ->with('navMenu', $navMenu)
                 ->with('unreadMessagesCount', $unreadMessagesCount);
        });
    }
}