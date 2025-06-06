<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrangTuaRequest;
use App\Http\Requests\UpdateOrangTuaRequest;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    //
    // tampilkan semua data ortu
    public function index(Request $request)
    {
        $query = OrangTua::with('mahasiswa');

        // filter data ortu
        $filters = [
            'penghasilan' => 'id_penghasilan',
            'pekerjaan' => 'id_pekerjaan',
            'agama' => 'id_agama',
            'pendidikan' => 'id_pendidikan',
            'status_hidup' => 'id_status_hidup',
            'hubungan' => 'id_hubungan',
        ];

        foreach ($filters as $param => $column) {
            if ($request->filled($param)) {
                $query->where($column, $request->input($param));
            }
        }

        $Orangtua = $query->get();

        return $Orangtua;
    }

    // Menampilkan data orangtua berdasarkan nim
    public function show($id_ortu)
    {
        $Orangtua = Orangtua::with('mahasiswa')->findOrFail($id_ortu);

        return response()->json($Orangtua); // <-- ini penting!

    }

    public function showByNim($nim)
    {
        $orangTua = OrangTua::where('nim', $nim)->get();

        if ($orangTua->isEmpty()) {
            return response()->json([
                'message' => 'Data orang tua tidak ditemukan untuk NIM tersebut'
            ], 404);
        }

        return response()->json($orangTua);
    }

    // Menambah data orangtua
    // public function store(StoreOrangTuaRequest $request)
    // {
    //     try {
    //         $data = $request->validated();

    //         $Orangtua = OrangTua::create($data);

    //         return response()->json([
    //             'message' => 'Orangtua berhasil ditambah.',
    //             'data' => $Orangtua
    //         ], 201);
    //     } catch (\Exception $e) {

    //         return response()->json([
    //             'message' => 'Gagal menambah Orangtua',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // Menambah data orangtua
    public function store(StoreOrangTuaRequest $request)
    {
        try {
            $data = $request->validated();

            // Ambil semua data ortu berdasarkan NIM
            $existingOrtu = OrangTua::where('nim', $data['nim'])->get();

            // 1. Cek apakah sudah punya 3 data ortu
            if ($existingOrtu->count() >= 3) {
                return response()->json([
                    'message' => 'Setiap NIM hanya boleh memiliki maksimal 3 data orangtua (Ayah, Ibu, Wali).'
                ], 422);
            }

            // 2. Cek apakah id_hubungan yang sama sudah ada untuk NIM tersebut
            $duplicateHubungan = $existingOrtu->where('id_hubungan', $data['id_hubungan'])->first();

            if ($duplicateHubungan) {
                return response()->json([
                    'message' => 'Setiap jenis hubungan (Ayah, Ibu, Wali) hanya boleh satu kali per NIM.'
                ], 422);
            }

            // Lolos semua validasi → simpan data
            $Orangtua = OrangTua::create($data);

            return response()->json([
                'message' => 'Orangtua berhasil ditambah.',
                'data' => $Orangtua
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambah Orangtua',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    // Mengupdate data orangtua
    public function update(UpdateOrangTuaRequest $request, $id_ortu)
    {
        try {
            $Orangtua = Orangtua::findOrFail($id_ortu);

            $data = $request->validated();

            $Orangtua->update($data);

            return response()->json([
                'message' => 'Orangtua berhasil diupdate.',
                'data' => $Orangtua
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengupdate Orangtua',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Menghapus data orangtua
    public function destroy($id_ortu)
    {
        try {
            $Orangtua = Orangtua::findOrFail($id_ortu);
            $Orangtua->delete();

            return response()->json([
                'message' => 'Orangtua berhasil dihapus.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus Orangtua',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
