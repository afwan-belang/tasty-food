<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Proyek Tasty Food Premium
|--------------------------------------------------------------------------
*/

// =========================================================================
// 1. RUTE TERBUKA / PUBLIK (Bisa Diakses Siapa Saja Tanpa Login)
// =========================================================================
// Diubah ke Controller karena halaman Home sekarang memuat data Food Card dari database
Route::get('/', [PageController::class, 'home'])->name('home');

// =========================================================================
// 2. RUTE GERBANG AUTENTIKASI (Hanya Bisa Diakses Jika BELUM Login / Guest)
// =========================================================================
Route::middleware('guest')->group(function () {
    // Alur Registrasi Akun Baru
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Alur Masuk Akun (Login)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rute Keluar Akun (Wajib Login terlebih dahulu)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// =========================================================================
// 3. RUTE USER TERPROTEKSI (Wajib Login, Jika Belum Akan Stuck/Mental ke Home/Login)
// =========================================================================
Route::middleware('auth')->group(function () {
    Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
    Route::get('/berita', [PageController::class, 'berita'])->name('berita');
    Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
    Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

    // API Endpoint Spesifik: Dipanggil oleh Vanilla JS untuk memuat data Popup Modal secara instan
    Route::get('/api/food/{id}', [FoodController::class, 'getFoodDetail'])->name('food.detail');
});

// =========================================================================
// 4. RUTE KHUSUS ADMIN (Wajib Login + Lolos Saringan AdminMiddleware - CRUD Penuh)
// =========================================================================
Route::middleware(['auth', 'AdminMiddleware'])->prefix('admin')->name('admin.')->group(function () {
    // Tambah Data Makanan Baru (Menampilkan Form & Menyimpan ke DB)
    Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
    Route::post('/food/store', [FoodController::class, 'store'])->name('food.store');
    
    // Edit Data Makanan (Menampilkan Form Edit & Memperbarui DB)
    Route::get('/food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('/food/{id}', [FoodController::class, 'update'])->name('food.update');
    
    // Hapus Data Makanan Permanen
    Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');
});