<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KolStatusSipilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('kol_status_sipil')->insert([
            ['id_status_sipil' => 'B', 'nama_status_sipil' => 'Belum Menikah'],
            ['id_status_sipil' => 'M', 'nama_status_sipil' => 'Menikah'],
        ]);
    }
}
