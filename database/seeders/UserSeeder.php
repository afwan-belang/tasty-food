<?php

// ✅ PERBAIKAN: Mengubah ke huruf kapital murni agar lolos dari error Case-Sensitive di Linux
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Akun Admin Utama
        User::create([
            'name' => 'Admin Tasty Food',
            'email' => 'admin@tastyfood.com',
            'password' => Hash::make('password123'), // Keamanan enkripsi password Bcrypt
            'role' => 'admin',
        ]);

        // Membuat Akun User Reguler Uji Coba
        User::create([
            'name' => 'Haikal Afwan',
            'email' => 'haikal@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}