<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    \App\Models\Poli::create(['nama_poli' => 'Rawat Jalan']);
    \App\Models\Poli::create(['nama_poli' => 'Konsultasi Gizi']);
    \App\Models\Poli::create(['nama_poli' => 'Kesehatan Ibu dan Anak (KIA)']);
    \App\Models\Poli::create(['nama_poli' => 'Imunisasi']);
    \App\Models\Poli::create(['nama_poli' => 'Keluarga Berencana (KB)']);
    \App\Models\Poli::create(['nama_poli' => 'Pemeriksaan Laboratorium']);
}
}
