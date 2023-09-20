<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['nama_jenis' => 'CC', 'category_id' => 1],
            ['nama_jenis' => 'RTG', 'category_id' => 1],
            ['nama_jenis' => 'Kubikel', 'category_id' => 2], 
            ['nama_jenis' => 'Kabel', 'category_id' => 2], 
            ['nama_jenis' => 'Fender', 'category_id' => 3],
            ['nama_jenis' => 'Bolder', 'category_id' => 3]
        ]);
    }
}
