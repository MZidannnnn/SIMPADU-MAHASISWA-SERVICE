<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;

Route::get('/tes', fn () => 'API Tes OK!');

Route::apiResource('pengumuman', PengumumanController::class);
Route::apiResource('mahasiswa', MahasiswaController::class)->parameters([
    'mahasiswa' => 'nim',
]);

// Route::put('/mahasiswa/profile/update', [MahasiswaController::class, 'updateProfileMahasiswa']);
Route::get('/status_mhs', [MahasiswaController::class, 'DaftarStatusMahasiswa']);