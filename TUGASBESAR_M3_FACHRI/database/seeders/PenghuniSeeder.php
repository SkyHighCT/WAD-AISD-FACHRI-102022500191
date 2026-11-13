<?php

namespace Database\Seeders;

use App\Models\Penghuni;
use Illuminate\Database\Seeder;

class PenghuniSeeder extends Seeder
{
    public function run(): void
    {
        Penghuni::insert([
            ['nama' => 'Julank', 'no_ktp' => '083333333333', 'pekerjaan' => 'Mahasiswa', 'no_kamar' => 'A-01', 'kontak_darurat' => 'Didil (0812111111111)'],
            ['nama' => 'Julenk', 'no_ktp' => '082222222222', 'pekerjaan' => 'Mahasiswa', 'no_kamar' => 'B-03', 'kontak_darurat' => 'Tia (083111111111)'],
            ['nama' => 'Julonk', 'no_ktp' => '081111111111', 'pekerjaan' => 'Mahasiswa', 'no_kamar' => 'A-05', 'kontak_darurat' => 'Nana (082111111111)'],
        ]);
    }
}
