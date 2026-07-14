<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanySection; // Memanggil model seksi dinamis baru
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
        // ✅ REGISTRASI VIEW COMPOSER GLOBAL: Menyuntikkan data info kontak ke komponen footer
        View::composer('components.layout.footer', function ($view) {
            $footerContact = CompanySection::where('key', 'contact_info')->first();
            $view->with('footerContact', $footerContact);
        });
    }
}