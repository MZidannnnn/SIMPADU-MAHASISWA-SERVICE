<?php
use App\Models\OrangTua;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;

Route::get('/tes', fn () => 'API Tes OK!');

// Route::get('/docs/openapi', function () {
//     return response()->file(public_path('docs/openapi.yaml'));
// });

Route::get('/mahasiswa/list_mahasiswa', [MahasiswaController::class, 'listMahasiswa']);
Route::get('/mahasiswa/orangtua/nim/{nim}', [OrangTuaController::class, 'showByNim']);

Route::apiResource('/mahasiswa/orangtua', OrangTuaController::class);
Route::apiResource('pengumuman', PengumumanController::class);

Route::apiResource('mahasiswa', MahasiswaController::class)->parameters([
     'mahasiswa' => 'nim',
]);




// List semua mahasiswa
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Tampilkan detail mahasiswa
// Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);

// Tambah mahasiswa
// Route::post('/mahasiswa', [MahasiswaController::class, 'store']);

// Update mahasiswa
// Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
// Route::patch('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);

// Hapus mahasiswa
// Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy']);

// Route::put('/mahasiswa/profile/update', [MahasiswaController::class, 'updateProfileMahasiswa']);
Route::get('/status_mhs', [MahasiswaController::class, 'DaftarStatusMahasiswa']);

