<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusMhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['id_status_mhs' => 'A', 'nama_status_mhs' => 'Aktif'],
            ['id_status_mhs' => 'C', 'nama_status_mhs' => 'Cuti'],
            ['id_status_mhs' => '2', 'nama_status_mhs' => 'SP2'],
            ['id_status_mhs' => '1', 'nama_status_mhs' => 'SP1'],
            ['id_status_mhs' => 'D', 'nama_status_mhs' => 'Drop-out'],
            ['id_status_mhs' => 'L', 'nama_status_mhs' => 'Lulus'],
            ['id_status_mhs' => '3', 'nama_status_mhs' => 'SP3'],
            ['id_status_mhs' => 'M', 'nama_status_mhs' => 'Mengundurkan Diri'],
            ['id_status_mhs' => 'T', 'nama_status_mhs' => 'Terminal'],
            ['id_status_mhs' => 'I', 'nama_status_mhs' => 'Meninggal Dunia'],
            ['id_status_mhs' => '4', 'nama_status_mhs' => 'Usulan SP3'],
            ['id_status_mhs' => '5', 'nama_status_mhs' => 'Usulan Mahasiswa Cuti Akademik'],
            ['id_status_mhs' => 'N', 'nama_status_mhs' => 'Non Aktif'],
            ['id_status_mhs' => '6', 'nama_status_mhs' => 'Usulan Mahasiswa Terminal'],
            ['id_status_mhs' => '7', 'nama_status_mhs' => 'Usulan Mahasiswa Mengundurkan Diri'],
            ['id_status_mhs' => '8', 'nama_status_mhs' => 'Usulan Mahasiswa Drop Out'],
        ];

        DB::table('siap_status_mhs')->insert($data);
    }
}
