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
        // ✅ REGISTRASI VIEW COMPOSER GLOBAL FOOTER: Menyuntikkan data info kontak ke komponen footer
        View::composer('components.layout.footer', function ($view) {
            $footerContact = CompanySection::where('key', 'contact_info')->first();
            $view->with('footerContact', $footerContact);
        });

        // ✅ REGISTRASI VIEW COMPOSER GLOBAL NAVBAR BRANDING: Menyuntikkan data logo/branding ke seluruh view publik
        View::composer('*', function ($view) {
            $siteBranding = CompanySection::where('key', 'site_branding')->first();
            $view->with('siteBranding', $siteBranding);
        });
    }
}