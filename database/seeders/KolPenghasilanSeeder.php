<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KolPenghasilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('kol_penghasilan')->insert([
            ['id_penghasilan' => '10', 'nama_penghasilan' => '< RP. 500.000'],
            ['id_penghasilan' => '20', 'nama_penghasilan' => 'Rp. 500.001 - Rp.1.000.000'],
            ['id_penghasilan' => '30', 'nama_penghasilan' => 'Rp. 1.000.001 - Rp. 1.500.000'],
            ['id_penghasilan' => '40', 'nama_penghasilan' => 'Rp. 1.500.001 - Rp. 2.500.001'],
            ['id_penghasilan' => '50', 'nama_penghasilan' => 'Rp. 2.500.001 - Rp. 4.000.000'],
            ['id_penghasilan' => '60', 'nama_penghasilan' => '> Rp. 4.000.001'],
        ]);
    }
}
