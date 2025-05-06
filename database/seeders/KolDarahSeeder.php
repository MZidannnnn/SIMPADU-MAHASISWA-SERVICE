<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KolDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kol_darah')->insert([
            'id_darah' => 1,
            'nama_darah' => 'A',
        ]);
        DB::table('kol_darah')->insert([
            'id_darah' => 2,
            'nama_darah' => 'B',
        ]);
        DB::table('kol_darah')->insert([
            'id_darah' => 3,
            'nama_darah' => 'AB',
        ]);
        DB::table('kol_darah')->insert([
            'id_darah' => 4,
            'nama_darah' => 'O',
        ]);
    }
}
