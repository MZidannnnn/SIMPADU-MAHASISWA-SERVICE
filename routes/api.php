<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeringatanMhsController;
use App\Http\Controllers\StatusMhsController;


Route::get('/mahasiswa/list_mahasiswa', [MahasiswaController::class, 'listMahasiswa']);
Route::get('/peringatan_mhs', [PeringatanMhsController::class, 'index']);
Route::get('/status_mhs', [StatusMhsController::class, 'index']);
Route::middleware('jwt.validate')->group(function () {
    // CRUD orangtua
    Route::get('/mahasiswa/orangtua', [OrangTuaController::class, 'index']);
    // Tampilkan detail orangtua
    Route::get('/mahasiswa/orangtua/{id_ortu}', [OrangTuaController::class, 'show']);
    // Tambah orangtua
    Route::post('/mahasiswa/orangtua', [OrangTuaController::class, 'store']);
    // Update orangtua
    Route::put('/mahasiswa/orangtua/{id_ortu}', [OrangTuaController::class, 'update']);
    Route::patch('/mahasiswa/orangtua/{id_ortu}', [OrangTuaController::class, 'update']);
    // Hapus orangtua
    Route::delete('/mahasiswa/orangtua/{id_ortu}', [OrangTuaController::class, 'destroy']);


    // CRUD Mahasiswa

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

    // Tampilkan detail peringatan_mhs
    Route::get('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'show']);
    // Tambah peringatan_mhs
    Route::post('/peringatan_mhs', [PeringatanMhsController::class, 'store']);
    // Update peringatan_mhs
    Route::put('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'update']);
    Route::patch('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'update']);
    // Hapus peringatan_mhs
    Route::delete('/peringatan_mhs/{id_status_peringatan}', [PeringatanMhsController::class, 'destroy']);
});
// tampilkan nim,dan nama seluru mahasiswa
