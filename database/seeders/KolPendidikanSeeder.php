<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KolPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        DB::table('kol_pendidikan')->insert([ 
            ['id_pendidikan' => '1', 'nama_pendidikan' => 'Tidak Tamat SD'],
            ['id_pendidikan' => '2', 'nama_pendidikan' => 'SD'],
            ['id_pendidikan' => '3', 'nama_pendidikan' => 'SMP'],
            ['id_pendidikan' => '4', 'nama_pendidikan' => 'SMTA'],
            ['id_pendidikan' => '5', 'nama_pendidikan' => 'Diploma 3'],
            ['id_pendidikan' => '6', 'nama_pendidikan' => 'Diploma 4'],
            ['id_pendidikan' => '7', 'nama_pendidikan' => 'Sarjana'],
            ['id_pendidikan' => '8', 'nama_pendidikan' => 'Pasca Sarjana'],
            ['id_pendidikan' => '9', 'nama_pendidikan' => 'Doktor'],
            ['id_pendidikan' => '10', 'nama_pendidikan' => 'Diploma 1'],
            ['id_pendidikan' => '11', 'nama_pendidikan' => 'Diploma 2'],
            ['id_pendidikan' => '12', 'nama_pendidikan' => 'TK'],
            ['id_pendidikan' => '0', 'nama_pendidikan' => 'Belum Sekolah'],
        ]);
    }
}
