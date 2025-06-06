<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\Mahasiswa;
use App\Models\StatusMhs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    // Menampilkan seluruh data mahasiswa
    // public function index(Request $request)
    // {
       
    //     $query = Mahasiswa::with('status');


    //     // filter data mahasiswa
    //     $filters = [
    //         'status' => 'id_status_mhs',
    //         'prodi' => 'id_prodi',
    //         'angkatan' => 'thn_ak_masuk',
    //     ];

    //     foreach ($filters as $param => $column) {
    //         if ($request->filled($param)) {
    //             $query->where($column, $request->input($param));
    //         }
    //     }

    //     // $mahasiswa = $query->paginate(20);

    //     $Mahasiswas = $query->get();
    //     foreach ($Mahasiswas as $Mahasiswa) {
    //         foreach (
    //             [
    //                 'foto_profile',
    //                 'foto_ktp',
    //                 'foto_ijasah',
    //                 'foto_transkip',
    //                 'foto_kk',
    //                 'foto_ak',
    //                 'foto_sehat',
    //                 'foto_warna'
    //             ] as $field
    //         ) {
    //             $Mahasiswa->{$field . '_url'} = $Mahasiswa->{$field} !== 'blm_ada_foto.png'
    //                 ? asset('storage/' . $Mahasiswa->{$field})
    //                 : asset('assets/default/blm_ada_foto.png');
    //         }
    //     }

    //     return $Mahasiswas;
    // }

    // Menampilkan data mahasiswa berdasarkan nim
    public function show($nim)
    {
        $Mahasiswa = Mahasiswa::with('status', 'peringatan', 'ortu')->findOrFail($nim);

        foreach (
            [
                
                'foto_ktp',
                'foto_ijasah',
                'foto_transkip',
                'foto_kk',
                'foto_ak',
                'foto_sehat',
                'foto_warna'
            ] as $field
        ) {
            $Mahasiswa->{$field . '_url'} = $Mahasiswa->{$field} !== 'blm_ada_foto.png'
                ? asset('storage/' . $Mahasiswa->{$field})
                : asset('assets/default/blm_ada_foto.png');
        }

        return response()->json($Mahasiswa); // <-- ini penting!

    }

    // Menambah data mahasiswa
    public function store(StoreMahasiswaRequest $request)
    {

        try {
            $data = $request->validated();
            // $data = $request->except('ortu');

            // simpan foto 
            foreach ([ 'foto_ktp' => 'gambar_mahasiswa/foto_ktp', 'foto_ijasah' => 'gambar_mahasiswa/foto_ijasah', 'foto_transkip' => 'gambar_mahasiswa/foto_transkip', 'foto_kk' => 'gambar_mahasiswa/foto_kk', 'foto_ak' => 'gambar_mahasiswa/foto_ak', 'foto_sehat' => 'gambar_mahasiswa/foto_sehat', 'foto_warna' => 'gambar_mahasiswa/foto_warna'] as $field => $path) {
                if ($request->hasFile($field)) {
                    $data[$field] = $request->file($field)->store($path, 'public');
                }
            }

            $mahasiswa = Mahasiswa::create($data);

            return response()->json([
                'message' => 'Mahasiswa berhasil ditambah.',
                'data' => $mahasiswa
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Gagal menambah mahasiswa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Mengupdate data mahasiswa
    public function update(UpdateMahasiswaRequest $request, $nim)
    {
        try {
            $Mahasiswa = Mahasiswa::findOrFail($nim);

            $data = $request->validated();
            // $data = $request->except('ortu');

            foreach ([ 'foto_ktp' => 'gambar_mahasiswa/foto_ktp', 'foto_ijasah' => 'gambar_mahasiswa/foto_ijasah', 'foto_transkip' => 'gambar_mahasiswa/foto_transkip', 'foto_kk' => 'gambar_mahasiswa/foto_kk', 'foto_ak' => 'gambar_mahasiswa/foto_ak', 'foto_sehat' => 'gambar_mahasiswa/foto_sehat', 'foto_warna' => 'gambar_mahasiswa/foto_warna'] as $field => $path) {
                if ($request->hasFile($field)) {
                    if (!empty($Mahasiswa->{$field})) {
                        Storage::disk('public')->delete($Mahasiswa->{$field});
                    }
                    $data[$field] = $request->file($field)->store($path, 'public');
                }
            }
            Log::info('Data update:', $data);

            $Mahasiswa->update($data);

     

            return response()->json([
                'message' => 'Mahasiswa berhasil diupdate.',
                'data' => $Mahasiswa
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengupdate Mahasiswa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Menghapus data mahasiswa
    public function destroy($nim)
    {
        $Mahasiswa = Mahasiswa::findOrFail($nim);

        foreach (
            [
               
                'foto_ktp',
                'foto_ijasah',
                'foto_transkip',
                'foto_kk',
                'foto_ak',
                'foto_sehat',
                'foto_warna'
            ] as $field
        ) {
            if (!empty($Mahasiswa->{$field}) && Storage::disk('public')->exists($Mahasiswa->{$field})) {
                Storage::disk('public')->delete($Mahasiswa->{$field});
            }
        }

        $Mahasiswa->delete();

        return response()->json(['message' => 'Deleted']);
    }

    public function DaftarStatusMahasiswa()
    {
        $StatusMhs = StatusMhs::get();

        return $StatusMhs;
    }
    public function listMahasiswa()
    {
        $mahasiswa = Mahasiswa::select('nim', 'nama_mhs')->get();

        return response()->json($mahasiswa);
    }
    
}
