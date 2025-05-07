<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KolProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now();
        $provinsi = [
            ['id_prov' => '11', 'nama_prov' => 'Aceh'],
            ['id_prov' => '12', 'nama_prov' => 'Sumatera Utara'],
            ['id_prov' => '13', 'nama_prov' => 'Sumatera Barat'],
            ['id_prov' => '14', 'nama_prov' => 'Riau'],
            ['id_prov' => '15', 'nama_prov' => 'Jambi'],
            ['id_prov' => '16', 'nama_prov' => 'Sumatera Selatan'],
            ['id_prov' => '17', 'nama_prov' => 'Bengkulu'],
            ['id_prov' => '18', 'nama_prov' => 'Lampung'],
            ['id_prov' => '19', 'nama_prov' => 'Kepulauan Bangka Belitung'],
            ['id_prov' => '21', 'nama_prov' => 'Kepulauan Riau'],
            ['id_prov' => '31', 'nama_prov' => 'DKI Jakarta'],
            ['id_prov' => '32', 'nama_prov' => 'Jawa Barat'],
            ['id_prov' => '33', 'nama_prov' => 'Jawa Tengah'],
            ['id_prov' => '34', 'nama_prov' => 'DI Yogyakarta'],
            ['id_prov' => '35', 'nama_prov' => 'Jawa Timur'],
            ['id_prov' => '36', 'nama_prov' => 'Banten'],
            ['id_prov' => '51', 'nama_prov' => 'Bali'],
            ['id_prov' => '52', 'nama_prov' => 'Nusa Tenggara Barat'],
            ['id_prov' => '53', 'nama_prov' => 'Nusa Tenggara Timur'],
            ['id_prov' => '61', 'nama_prov' => 'Kalimantan Barat'],
            ['id_prov' => '62', 'nama_prov' => 'Kalimantan Tengah'],
            ['id_prov' => '63', 'nama_prov' => 'Kalimantan Selatan'],
            ['id_prov' => '64', 'nama_prov' => 'Kalimantan Timur'],
            ['id_prov' => '65', 'nama_prov' => 'Kalimantan Utara'],
            ['id_prov' => '71', 'nama_prov' => 'Sulawesi Utara'],
            ['id_prov' => '72', 'nama_prov' => 'Sulawesi Tengah'],
            ['id_prov' => '73', 'nama_prov' => 'Sulawesi Selatan'],
            ['id_prov' => '74', 'nama_prov' => 'Sulawesi Tenggara'],
            ['id_prov' => '75', 'nama_prov' => 'Gorontalo'],
            ['id_prov' => '76', 'nama_prov' => 'Sulawesi Barat'],
            ['id_prov' => '81', 'nama_prov' => 'Maluku'],
            ['id_prov' => '82', 'nama_prov' => 'Maluku Utara'],
            ['id_prov' => '91', 'nama_prov' => 'Papua Barat'],
            ['id_prov' => '92', 'nama_prov' => 'Papua'],
        ];

        // Tambahkan timestamps ke setiap elemen array
        $provinsi = array_map(function ($item) use ($timestamp) {
            return array_merge($item, [
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }, $provinsi);

        DB::table('kol_provinsi')->insert($provinsi);
    }
}
