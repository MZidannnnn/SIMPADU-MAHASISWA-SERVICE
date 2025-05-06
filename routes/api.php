<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;

Route::get('/tes', fn () => 'API Tes OK!');


// Route::middleware('auth.test')->group(function () {
//     Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
//     Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
//     Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
// });

Route::apiResource('pengumuman', PengumumanController::class);
Route::apiResource('mahasiswa', MahasiswaController::class)->parameters([
    'mahasiswa' => 'nim',
]);

Route::put('/mahasiswa/profile/update', [MahasiswaController::class, 'updateProfileMahasiswa']);

// Route::apiResource('mahasiswa', MahasiswaController::class);
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
