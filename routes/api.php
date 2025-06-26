<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeringatanMhsController;
use App\Http\Controllers\StatusMhsController;

// Route::middleware('has.token')->group(function () {
    // });
    

// CRUD Mahasiswa
// tampilkan nim,dan nama seluru mahasiswa
Route::get('/mahasiswa/list_mahasiswa', [MahasiswaController::class, 'listMahasiswa']);
// CRUD orangtua,store,put,show,delete,get
Route::apiResource('/mahasiswa/orangtua', OrangTuaController::class);
// Tampilkan detail mahasiswa
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
// Tambah mahasiswa
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
// Update mahasiswa
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
Route::patch('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
// Hapus mahasiswa
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy']);


//  CRUD status status_mhs
Route::get('/status_mhs', [StatusMhsController::class, 'index']);
// Tampilkan detail status_mhs
Route::get('/status_mhs/{id_status_mhs}', [StatusMhsController::class, 'show']);
// Tambah status_mhs
Route::post('/status_mhs', [StatusMhsController::class, 'store']);
// Update status_mhs
Route::put('/status_mhs/{id_status_mhs}', [StatusMhsController::class, 'update']);
Route::patch('/status_mhs/{id_status_mhs}', [StatusMhsController::class, 'update']);
// Hapus status_mhs
Route::delete('/status_mhs/{id_status_mhs}', [StatusMhsController::class, 'destroy']);


//  CRUD status peringatan_mhs
Route::get('/peringatan_mhs', [PeringatanMhsController::class, 'index']);
// Tampilkan detail peringatan_mhs
Route::get('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'show']);
// Tambah peringatan_mhs
Route::post('/peringatan_mhs', [PeringatanMhsController::class, 'store']);
// Update peringatan_mhs
Route::put('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'update']);
Route::patch('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'update']);
// Hapus peringatan_mhs
Route::delete('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'destroy']);