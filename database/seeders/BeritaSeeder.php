<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        DB::table('berita')->insert([
            'judul' => 'Judul Berita Pertama',
            'konten' => 'Konten Berita Pertama',
        ]);

    }
}
