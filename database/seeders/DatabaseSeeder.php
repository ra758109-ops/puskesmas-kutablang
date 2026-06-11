<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin otomatis saat seeder dijalankan
        User::create([
            'name' => 'Admin Puskesmas',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);
    }
}