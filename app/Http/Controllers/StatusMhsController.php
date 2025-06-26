<?php

namespace App\Http\Controllers;

use App\Models\StatusMhs;
use Illuminate\Http\Response;
use App\Http\Requests\StoreStatusMhsRequest;
use App\Http\Requests\UpdateStatusMhsRequest;

class StatusMhsController extends Controller
{
    /**
     * Menampilkan semua data status mahasiswa.
     */
    public function index()
    {
        $statusMhs = StatusMhs::all();
        return response()->json($statusMhs);
    }

    /**
     * Menyimpan data status mahasiswa baru.
     */
    public function store(StoreStatusMhsRequest $request)
    {
        try {
            $data = $request->validated();
            $statusMhs = StatusMhs::create($data);

            return response()->json([
                'message' => 'Status mahasiswa berhasil ditambah.',
                'data' => $statusMhs
            ], 201); 

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambah status mahasiswa.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan data status mahasiswa berdasarkan id.
     */
    public function show($id_status_mhs)
    {
        // findOrFail akan otomatis memberikan response 404 jika data tidak ditemukan
        $statusMhs = StatusMhs::findOrFail($id_status_mhs);
        return response()->json($statusMhs);
    }

    /**
     * Mengupdate data status mahasiswa.
     */
    public function update(UpdateStatusMhsRequest $request, $id_status_mhs)
    {
        try {
            $statusMhs = StatusMhs::findOrFail($id_status_mhs);
            $data = $request->validated();
            
            $statusMhs->update($data);

            return response()->json([
                'message' => 'Status mahasiswa berhasil diupdate.',
                'data' => $statusMhs
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengupdate status mahasiswa.',
                'error' => $e->getMessage()
            ], 500); // Menggunakan konstanta 500
        }
    }

    /**
     * Menghapus data status mahasiswa.
     */
    public function destroy($id_status_mhs)
    {
       
            $statusMhs = StatusMhs::findOrFail($id_status_mhs);
            $statusMhs->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus.'
            ], 200);
        
    }
}
