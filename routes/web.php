<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Proyek Portal Berita Tasty Food (Revisi CMS Portal Admin)
|--------------------------------------------------------------------------
*/

// =========================================================================
// 1. RUTE PUBLIK / UMUM (100% Bebas Akses Tanpa Login, Read-Only)
// =========================================================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [PageController::class, 'detailBerita'])->name('berita.detail');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// API Endpoint Detail: Dipanggil oleh Vanilla JS untuk Popup Modal (Bebas untuk Publik)
Route::get('/api/food/{id}', [FoodController::class, 'getFoodDetail'])->name('food.detail');


// =========================================================================
// 2. GERBANG OTENTIKASI RAHASIA ADMIN (Hidden Auth Gate)
// =========================================================================
Route::middleware('guest')->group(function () {
    // Halaman Login Khusus Tim Redaksi Admin
    });
    Route::get('/redaksi-login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/redaksi-login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Aksi Keluar dari Sesi Redaksi Admin Portal
Route::post('/redaksi-logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth');


// =========================================================================
// 3. PORTAL UTAMA EDITORIAL ADMIN (Protected: Monitoring & CRUD Penuh)
// =========================================================================
Route::middleware(['auth', 'AdminMiddleware'])->prefix('portal-admin')->name('admin.')->group(function () {
    
    // --- MENU NAVIGASI SIDEBAR KIRI ---
    // Menu 1: Dashboard Utama (Monitoring Seluruh Campuran Asset Konten)
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Menu 2: Card Management (Monitoring Khusus Komponen Card Home)
    Route::get('/card', [AdminDashboardController::class, 'card'])->name('card');
    
    // Menu 3: Berita Management (Monitoring Khusus Seksi Berita)
    Route::get('/berita', [AdminDashboardController::class, 'berita'])->name('berita');
    
    // Menu 4: Galeri Management (Monitoring Khusus Aset Foto Portfolio)
    Route::get('/galeri', [AdminDashboardController::class, 'galeri'])->name('galeri');
    
    // Menu 5: Settings Portal (Form Ganti Profil, Password, dan Pilihan Tema)
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
    Route::put('/settings/profile', [AdminDashboardController::class, 'updateProfile'])->name('settings.profile');
    Route::put('/settings/password', [AdminDashboardController::class, 'updatePassword'])->name('settings.password');
    Route::post('/settings/theme', [AdminDashboardController::class, 'toggleTheme'])->name('settings.theme');


    // --- ENGINE AKSI UTAMA UTALITAS CRUD (Terhubung Sinkron ke Web Utama) ---
    // Aksi Create: Menampilkan Form & Menyimpan Data Konten Baru
    Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
    Route::post('/food/store', [FoodController::class, 'store'])->name('food.store');
    
    // Aksi Update: Menampilkan Form Edit & Memperbarui Data ke Database
    Route::get('/food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('/food/{id}', [FoodController::class, 'update'])->name('food.update');
    
    // Aksi Delete: Menghapus Data Konten Secara Permanen dari Server
    Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');
});