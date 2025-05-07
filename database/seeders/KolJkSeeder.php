<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KolJkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kol_jk')->insert([
            [
                'id_jk' => 1,
                'nama_jk' => 'L',
                'ket' => 'Laki-Laki',
            ],
            [
                'id_jk' => 2,
                'nama_jk' => 'P',
                'ket' => 'Perempuan',
            ],
        ]);
    }
}
