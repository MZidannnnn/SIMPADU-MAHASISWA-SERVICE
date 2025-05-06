<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    // Menampilkan seluruh data mahasiswa
    public function index()
    {
        $Mahasiswas = Mahasiswa::all();

        foreach ($Mahasiswas as $Mahasiswa) {
            if ($Mahasiswa->foto) {
                $Mahasiswa->gambar_url = asset('storage/' . $Mahasiswa->foto);
            } else {
                $Mahasiswa->gambar_url = null;
            }
        }

        return $Mahasiswas;
    }

    // Menampilkan data mahasiswa berdasarkan nim
    public function show($nim)
    {
        $Mahasiswa = Mahasiswa::findOrFail($nim);

        if ($Mahasiswa->foto) {
            $Mahasiswa->gambar_url = asset('storage/' . $Mahasiswa->foto);
        } else {
            $Mahasiswa->gambar_url = null;
        }
        return response()->json($Mahasiswa); // <-- ini penting!
    }

    // Menambah data mahasiswa
    public function store(StoreMahasiswaRequest $request)
    {
        try {
            $data = $request->validated(); // ambil data yang sudah divalidasi otomatis

            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('gambar_mahasiswa', 'public');
            }

            $Mahasiswa = Mahasiswa::create($data);

            return response()->json([
                'message' => 'Mahasiswa berhasil ditambah.',
                'data' => $Mahasiswa
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambah pengumuman',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Mengupdate data mahasiswa
    public function update(UpdateMahasiswaRequest $request, $nim)
    {
        try {
            $Mahasiswa = Mahasiswa::findOrFail($nim);

            $data = $request->validated(); // ambil data yang sudah divalidasi otomatis

            if ($request->hasFile('foto')) {
                if ($Mahasiswa->foto) {
                    Storage::disk('public')->delete($Mahasiswa->foto);
                }
                $data['foto'] = $request->file('foto')->store('gambar_mahasiswa', 'public');
            }

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

        if ($Mahasiswa->foto) {
            Storage::disk('public')->delete($Mahasiswa->foto);
        }

        $Mahasiswa->delete();

        return response()->json(['message' => 'Deleted']);
    }

    // mengupdate profile mahasiswa(khusus role mahasiswa)
    public function updateProfileMahasiswa(Request $request)
    {
        // Hardcode NIM seolah-olah user yang login
        $nim = 'C030323038'; // Ganti dengan NIM nyata untuk testing

        try {
            $Mahasiswa = Mahasiswa::findOrFail($nim);

            $validated = $request->validate([
                'nama_mhs' => 'sometimes|max:145',
                'jk' => 'nullable|in:L,P',
                'tempat_lahir' => 'nullable|max:50',
                'tgl_lahir' => 'nullable|date',
                'kelas' => 'sometimes|max:3',
                'email' => 'nullable|email|max:100',
                'handphone' => 'nullable|max:50',
                'alamat' => 'nullable|max:255',
                'foto' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('foto')) {
                if ($Mahasiswa->foto && $Mahasiswa->foto !== 'blm_ada_foto.jpg') {
                    Storage::disk('public')->delete($Mahasiswa->foto);
                }
                $validated['foto'] = $request->file('foto')->store('gambar_mahasiswa', 'public');
            }

            $Mahasiswa->update($validated);

            return response()->json([
                'message' => 'Profil mahasiswa berhasil diperbarui.',
                'data' => $Mahasiswa
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui profil mahasiswa.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
