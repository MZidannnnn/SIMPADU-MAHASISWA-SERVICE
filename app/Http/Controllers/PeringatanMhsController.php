<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeringatanMhsRequest;
use App\Http\Requests\UpdatePeringatanMhsRequest;
use App\Models\PeringatanMhs;

class PeringatanMhsController extends Controller
{
    /**
     * Menampilkan semua data status peringatan mahasiswa.
     */
    public function index()
    {
        $peringatanMhs = PeringatanMhs::all();
        return response()->json($peringatanMhs);
    }

    /**
     * Menyimpan data status peringatan mahasiswa baru.
     */
    public function store(StorePeringatanMhsRequest $request)
    {
        try {
            $data = $request->validated();
            $peringatanMhs = PeringatanMhs::create($data);

            return response()->json([
                'message' => 'Status peringatan mahasiswa berhasil ditambah.',
                'data' => $peringatanMhs
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambah status peringatan mahasiswa.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan data status peringatan mahasiswa berdasarkan id.
     */
    public function show($id_status_peringatan)
    {
        // findOrFail akan otomatis memberikan response 404 jika data tidak ditemukan
        $peringatanMhs = PeringatanMhs::findOrFail($id_status_peringatan);
        return response()->json($peringatanMhs);
    }

    /**
     * Mengupdate data status peringatan mahasiswa.
     */
    public function update(UpdatePeringatanMhsRequest $request, $id_status_peringatan)
    {
        try {
            $peringatanMhs = PeringatanMhs::findOrFail($id_status_peringatan);
            $data = $request->validated();
            
            $peringatanMhs->update($data);

            return response()->json([
                'message' => 'Status peringatan mahasiswa berhasil diupdate.',
                'data' => $peringatanMhs
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengupdate status peringatan mahasiswa.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menghapus data status peringatan mahasiswa.
     */
    public function destroy($id_status_peringatan)
    {
        $peringatanMhs = PeringatanMhs::findOrFail($id_status_peringatan);
        $peringatanMhs->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus.'
        ], 200);
    }
}
