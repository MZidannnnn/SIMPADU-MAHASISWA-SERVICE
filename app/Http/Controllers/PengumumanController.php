<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePengumumanRequest;
use App\Http\Requests\UpdatePengumumanRequest;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::all();

        foreach ($pengumumans as $pengumuman) {
            if ($pengumuman->gambar) {
                $pengumuman->gambar_url = asset('storage/' . $pengumuman->gambar);
            } else {
                $pengumuman->gambar_url = null;
            }
        }

        return $pengumumans;
    }

    public function store(StorePengumumanRequest $request)
    {
        try {
            $data = $request->validated(); // ambil data yang sudah divalidasi otomatis

            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('gambar_pengumuman', 'public');
            }

            $pengumuman = Pengumuman::create($data);

            return response()->json([
                'message' => 'Pengumuman berhasil ditambah.',
                'data' => $pengumuman
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambah pengumuman',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->gambar) {
            $pengumuman->gambar_url = asset('storage/' . $pengumuman->gambar);
        } else {
            $pengumuman->gambar_url = null;
        }

        return $pengumuman;
    }

    public function update(UpdatePengumumanRequest $request, $id)
    {
        try {
            $pengumuman = Pengumuman::findOrFail($id);

            $data = $request->validated(); // ambil data yang sudah divalidasi otomatis

            if ($request->hasFile('gambar')) {
                if ($pengumuman->gambar) {
                    Storage::disk('public')->delete($pengumuman->gambar);
                }
                $data['gambar'] = $request->file('gambar')->store('gambar_pengumuman', 'public');
            }

            $pengumuman->update($data);

            return response()->json([
                'message' => 'Pengumuman berhasil diupdate.',
                'data' => $pengumuman
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengupdate pengumuman',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->gambar) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        $pengumuman->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
