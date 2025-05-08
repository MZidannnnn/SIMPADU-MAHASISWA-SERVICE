<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KolStatusHidupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kol_status_hidup')->insert([
            ['id_status_hidup' => '1', 'nama_status_hidup' => 'Masih Hidup'],
            ['id_status_hidup' => '2', 'nama_status_hidup' => 'Sudah Meninggal'],
        ]);
    }
}
