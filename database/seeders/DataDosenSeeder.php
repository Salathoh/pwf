<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\DataDosen;

class DataDosenSeeder extends Seeder
{
    public function run()
    {
        DataDosen::create([
            'nama' => 'Nama Dosen 1',
            'nip' => '12345',
            'mata_kuliah' => 'Matematika',
            'email' => 'dosen1@gmail.com',
        ]);

        DataDosen::create([
            'nama' => 'Nama Dosen 2',
            'nip' => '67890',
            'mata_kuliah' => 'Fisika',
            'email' => 'dosen2@gmail.com',
        ]);

        // Tambahkan data dosen lainnya sesuai kebutuhan
    }
}
