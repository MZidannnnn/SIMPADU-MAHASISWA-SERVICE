<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KolAgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kol_agama')->insert([
            'id_agama' => 1,
            'nama_agama' => 'ISLAM',
            'id_feeder' => 1,
        ]);
        DB::table('kol_agama')->insert([ 
            'id_agama' => 2,
            'nama_agama' => 'KRISTEN KATOLIK',
            'id_feeder' => 3,
        ]);
        DB::table('kol_agama')->insert([
            'id_agama' => 3,
            'nama_agama' => 'KRISTEN PROTESTAN',
            'id_feeder' => 2,
        ]);
        DB::table('kol_agama')->insert([
            'id_agama' => 4,
            'nama_agama' => 'BUDHA',
            'id_feeder' => 5,
        ]);
        DB::table('kol_agama')->insert([
            'id_agama' => 5,
            'nama_agama' => 'HINDU',
            'id_feeder' => 4,
        ]);
        DB::table('kol_agama')->insert([
            'id_agama' => 6,
            'nama_agama' => 'LAIN-LAIN',
            'id_feeder' => 99,
        ]);
    }
}
