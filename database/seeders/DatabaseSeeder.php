<?php

namespace Database\Seeders;

use App\Models\KolDarah;
use App\Models\KolPekerjaan;
use App\Models\KolPendidikan;
use App\Models\KolStatusHidup;
use App\Models\KolStatusSipil;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            StatusMhsSeeder::class,
            // KolDarahSeeder::class,
            // KolJkSeeder::class,
            // KolJurusanSekolahSeeder::class,
            // KolKabupatenSeeder::class,
            // KolProvinsiSeeder::class,
            // KolPekerjaanSeeder::class,
            // KolPendidikanSeeder::class,
            // KolPenghasilanSeeder::class,
            // KolStatusHidupSeeder::class,
            // KolStatusSipilSeeder::class,
            // Add other seeders here
        ]);
      
    }
}
