<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        // $nim = $this->route('mahasiswa'); // nim dari route parameter
        return [
            // Validasi untuk mahasiswa
            'nim' => 'required|string|min:10|max:10|unique:siap_mhs,nim',
            'id_kategori_spp' => 'required|integer',
            'thn_ak_masuk' => 'nullable|string|size:5',
            'thn_ak_lulus' => 'nullable|string|size:5',
            'nama_mhs' => 'required|string|max:145',
            'nik_mhs' => 'nullable|string|max:16|min:16|unique:siap_mhs,nik_mhs',
            'nisn' => 'nullable|string|max:16|min:16|unique:siap_mhs,nisn',
            'id_status_mhs' => 'nullable|string|size:1',
            'id_prodi' => 'nullable|integer',
            'id_jk' => 'nullable|integer',
            'id_darah' => 'nullable|integer',
            'warga_negara' => 'nullable|string|size:3',
            'kebangsaan' => 'nullable|string|max:50',
            'tempat_lahir' => 'nullable|string|max:50',
            'tgl_lahir' => 'nullable|date',
            'id_agama' => 'nullable|integer',
            'id_status_sipil' => 'nullable|string|size:1',
            'id_wil' => 'required|string|size:8',
            'id_kabupaten' => 'nullable|string|size:10',
            'id_prov' => 'nullable|string|size:2',
            'handphone' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:100',
            'sekolah_asal' => 'nullable|string|max:100',
            'id_jurusan_sekolah' => 'nullable|integer',
            'nilai_sekolah' => 'nullable|numeric',
            'tgl_lulus' => 'nullable|date',
            'IPK' => 'nullable|numeric|between:0,4',
            'id_status_peringatan' => 'nullable|string|size:1',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ijasah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_transkip' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ak' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_sehat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_warna' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        // Log detail error ke laravel.log
        Log::error('Validasi StoreMahasiswaRequest gagal', [
            'errors' => $validator->errors()->toArray(),
            'input' => $this->all(),
            'route' => $this->path(),
        ]);

        throw new HttpResponseException(response()->json([
            'message' => 'Validasi gagal.',
            'errors' => $validator->errors(),
        ], 422));
    }
}
