<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
            //
            // 'nim' => 'sometimes|required|max:16|unique:siap_mhs,nim,' . $nim,
            // 'nim' => 'sometimes|max:16|unique:siap_mhs,nim,' . $this->route('nim') . ',nim',
            // 'nama_mhs' => 'sometimes|required|max:145',
            // 'jk' => 'nullable|in:L,P',
            // 'tempat_lahir' => 'nullable|max:50',
            // 'tgl_lahir' => 'nullable|date',
            // 'id_prodi' => 'nullable|integer',
            // 'kelas' => 'sometimes|required|max:3',
            // 'nilai_masuk' => 'nullable|numeric',
            // 'thn_ak_masuk' => 'sometimes|required|max:5',
            // 'thn_ak_lulus' => 'sometimes|required|max:5',
            // 'ipk' => 'sometimes|required|numeric',
            // 'email' => 'nullable|email|max:100',
            // 'handphone' => 'nullable|max:50',
            // 'alamat' => 'nullable|max:255',
            // 'id_status_aktif_mhs' => 'sometimes|required|integer',
            // 'foto' => 'nullable|file|image|max:2048', // max dalam kilobyte (2048 KB = 2 MB)
            'nim' => 'sometimes|required|string|max:16|unique:siap_mhs,nim,' . $this->route('nim') . ',nim',
            'id_kategori_spp' => 'sometimes|integer',
            // 'id_status_spp' => 'nullable|integer',
            'thn_ak_masuk' => 'sometimes|required|string|size:5',
            'thn_ak_lulus' => 'sometimes|required|string|size:5',
            'nama_mhs' => 'sometimes|required|string|max:145',
            'nik_mhs' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|max:255',
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
            'id_wil' => 'sometimes|required|string|size:8',
            'id_kabupaten' => 'nullable|string|size:10',
            'id_prov' => 'nullable|string|size:2',
            'handphone' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:100',

            'sekolah_asal' => 'nullable|string|max:100',
            'id_jurusan_sekolah' => 'nullable|integer',
            'nilai_sekolah' => 'nullable|numeric',
            'tgl_lulus' => 'nullable|date',
            'IPK' => 'nullable|numeric|between:0,4',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ijasah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_transkip' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ak' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_sehat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_warna' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Validasi data orangtua (ortu)
            // 'ortu' => 'nullable|array',
            // 'ortu.nama_ayah' => 'nullable|string|max:50',
            // 'ortu.nik_ayah' => 'nullable|string|max:255',
            // 'ortu.id_agama_ayah' => 'nullable|integer',
            // 'ortu.id_pendidikan_ayah' => 'nullable|string|max:2',
            // 'ortu.id_pekerjaan_ayah' => 'nullable|string|max:1',
            // 'ortu.id_status_hidup_ayah' => 'nullable|string|max:1',
            // 'ortu.nama_ibu' => 'nullable|string|max:50',
            // 'ortu.nik_ibu' => 'nullable|string|max:255',
            // 'ortu.id_agama_ibu' => 'nullable|integer',
            // 'ortu.id_pendidikan_ibu' => 'nullable|string|max:2',
            // 'ortu.id_pekerjaan_ibu' => 'nullable|string|max:1',
            // 'ortu.id_status_hidup_ibu' => 'nullable|string|max:1',
            // 'ortu.penghasilan_ayah' => 'nullable|integer',
            // 'ortu.penghasilan_ibu' => 'nullable|integer',
            // 'ortu.id_kabupaten_ortu' => 'nullable|string|size:10',
            // 'ortu.id_prov_ortu' => 'nullable|string|size:2',
            // 'ortu.negara_ortu' => 'nullable|string|max:50',
            // 'ortu.handphone_ortu' => 'nullable|string|max:50',
            // 'ortu.email_ortu' => 'nullable|string|email|max:100',
            // 'ortu.tgl_lahir_ayah' => 'nullable|date',
            // 'ortu.tgl_lahir_ibu' => 'nullable|date',

        ];
    }
    protected function failedValidation(Validator $validator)
    {
        Log::error('Validasi UpdateMahasiswaRequest gagal', [
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
