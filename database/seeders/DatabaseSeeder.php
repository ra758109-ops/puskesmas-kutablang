<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin buat kamu login
        User::create([
            'name' => 'Admin Puskesmas',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'), // Ini cara Laravel yang benar
        ]);

        // 2. Panggil Seeder Poli & Dokter biar data pendaftaran tetap jalan
        $this->call([
            PoliSeeder::class,
            DokterSeeder::class,
        ]);
    }
}
