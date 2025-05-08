<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KolPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('kol_pekerjaan')->insert([ 
            ['id_pekerjaan' => '1', 'nama_pekerjaan' => 'PNS (Pegawai Negeri Sipil)'],
            ['id_pekerjaan' => '2', 'nama_pekerjaan' => 'TNI/POLRI'],
            ['id_pekerjaan' => '3', 'nama_pekerjaan' => 'Pegawai Swasta'],
            ['id_pekerjaan' => '4', 'nama_pekerjaan' => 'Wiraswasta / Usaha Sendiri'],
            ['id_pekerjaan' => '5', 'nama_pekerjaan' => 'Tidak Bekerja'],
            ['id_pekerjaan' => '6', 'nama_pekerjaan' => 'Pensiun'],
            ['id_pekerjaan' => '7', 'nama_pekerjaan' => 'Lain-lain'],
            ['id_pekerjaan' => '8', 'nama_pekerjaan' => 'Ibu Rumah Tangga'],
        ]);
    }
}
