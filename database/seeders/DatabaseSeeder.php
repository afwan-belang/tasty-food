<?php

namespace Database\Seeders; // Menggunakan huruf kapital

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FoodSeeder::class,
        ]);
    }
}