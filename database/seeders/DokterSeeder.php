<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
{
    \App\Models\Dokter::create(['nama_dokter' => 'Dr. Ahmad Hidayat', 'poli_id' => 1]);
    \App\Models\Dokter::create(['nama_dokter' => 'Nurul Fatimah, AMG', 'poli_id' => 2]);
    \App\Models\Dokter::create(['nama_dokter' => 'Bidan Siti Nurhaliza', 'poli_id' => 3]);
    \App\Models\Dokter::create(['nama_dokter' => 'Bidan Rini Wijaya', 'poli_id' => 4]);
    \App\Models\Dokter::create(['nama_dokter' => 'Bidan Sarah Adelia', 'poli_id' => 5]);
    \App\Models\Dokter::create(['nama_dokter' => 'Ananda Pratama, A.Md.AK', 'poli_id' => 6]);
}
}
