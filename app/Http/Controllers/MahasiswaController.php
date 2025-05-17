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
    public function index(Request $request)
    {
        // $Mahasiswas = Mahasiswa::with('status')->get();
        // $query = Mahasiswa::query();
        $query = Mahasiswa::with('status');


        // filter data mahasiswa
        $filters = [
            'status' => 'id_status_mhs',
            'prodi' => 'id_prodi',
            'angkatan' => 'thn_ak_masuk',
        ];

        foreach ($filters as $param => $column) {
            if ($request->filled($param)) {
                $query->where($column, $request->input($param));
            }
        }

        // $mahasiswa = $query->paginate(20);

        $Mahasiswas = $query->get();
        foreach ($Mahasiswas as $Mahasiswa) {
            foreach (
                [
                    'foto_profile',
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
        }

        return $Mahasiswas;
    }

    // Menampilkan data mahasiswa berdasarkan nim
    public function show($nim)
    {
        $Mahasiswa = Mahasiswa::with('status')->findOrFail($nim);

        foreach (
            [
                'foto_profile',
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
            foreach (['foto_profile' => 'gambar_mahasiswa/foto_profile', 'foto_ktp' => 'gambar_mahasiswa/foto_ktp', 'foto_ijasah' => 'gambar_mahasiswa/foto_ijasah', 'foto_transkip' => 'gambar_mahasiswa/foto_transkip', 'foto_kk' => 'gambar_mahasiswa/foto_kk', 'foto_ak' => 'gambar_mahasiswa/foto_ak', 'foto_sehat' => 'gambar_mahasiswa/foto_sehat', 'foto_warna' => 'gambar_mahasiswa/foto_warna'] as $field => $path) {
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

            foreach (['foto_profile' => 'gambar_mahasiswa/foto_profile', 'foto_ktp' => 'gambar_mahasiswa/foto_ktp', 'foto_ijasah' => 'gambar_mahasiswa/foto_ijasah', 'foto_transkip' => 'gambar_mahasiswa/foto_transkip', 'foto_kk' => 'gambar_mahasiswa/foto_kk', 'foto_ak' => 'gambar_mahasiswa/foto_ak', 'foto_sehat' => 'gambar_mahasiswa/foto_sehat', 'foto_warna' => 'gambar_mahasiswa/foto_warna'] as $field => $path) {
                if ($request->hasFile($field)) {
                    if (!empty($Mahasiswa->{$field})) {
                        Storage::disk('public')->delete($Mahasiswa->{$field});
                    }
                    $data[$field] = $request->file($field)->store($path, 'public');
                }
            }
            Log::info('Data update:', $data);

            $Mahasiswa->update($data);

            // // Jika ada data 'ortu' pada request, update tabel orangtua
            // if ($request->has('ortu')) {
            //     $dataOrtu = $request->input('ortu');
            //     $dataOrtu['nim'] = $Mahasiswa->nim; // pastikan nim mahasiswa dimasukkan

            //     // Mengupdate data orang tua berdasarkan nim mahasiswa
            //     $Ortu = OrangTua::where('nim', $Mahasiswa->nim)->first();
            //     if ($Ortu) {
            //         $Ortu->update($dataOrtu);
            //     } else {
            //         // Jika data orang tua tidak ditemukan, buat data baru (opsional)
            //         OrangTua::create($dataOrtu);
            //     }
            // }

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
        $Mahasiswa = Mahasiswa::with('ortu')->findOrFail($nim);

        foreach (
            [
                'foto_profile',
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
