<?php
use App\Models\OrangTua;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;

// Route::middleware('has.token')->group(function () {
    // });
    
// tampilkan nim,dan nama seluru mahasiswa
Route::get('/mahasiswa/list_mahasiswa', [MahasiswaController::class, 'listMahasiswa']);
// CRUD orangtua,store,put,show,delete,get
Route::apiResource('/mahasiswa/orangtua', OrangTuaController::class);
// CRUD pengumuman,store,put,show,delete,get
Route::apiResource('pengumuman', PengumumanController::class);
// Tampilkan detail mahasiswa
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
// Tambah mahasiswa
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
// Update mahasiswa
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
Route::patch('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
// Hapus mahasiswa
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy']);
Route::get('/status_mhs', [MahasiswaController::class, 'DaftarStatusMahasiswa']);