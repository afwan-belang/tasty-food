<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/berita', 'berita')->name('berita');
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/kontak', 'kontak')->name('kontak');