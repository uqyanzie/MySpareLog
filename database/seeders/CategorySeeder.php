<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['nama_kategori' => 'Peralatan Faspel'],
            ['nama_kategori' => 'Instalasi Faspel' ],
            ['nama_kategori' => 'Fasilitas Pelabuhan'], 
            ['nama_kategori' => 'Kearsipan/Keuangan'], 
            ['nama_kategori' => 'Rumah Tangga & Umum']
        ]);
    }
}
