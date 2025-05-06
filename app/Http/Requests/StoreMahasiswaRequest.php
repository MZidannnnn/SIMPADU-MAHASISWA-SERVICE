<?php

namespace App\Http\Requests;

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
            //
            // 'nim' => 'sometimes|required|max:16|unique:siap_mhs,nim,' . $nim,
            'nim' => 'required|max:16|unique:siap_mhs,nim,' . $this->route('nim') . ',nim',
            'nama_mhs' => 'required|max:145',
            'jk' => 'nullable|in:L,P',
            'tempat_lahir' => 'nullable|max:50',
            'tgl_lahir' => 'nullable|date',
            'id_prodi' => 'nullable|integer',
            'kelas' => 'required|max:3',
            'nilai_masuk' => 'nullable|numeric',
            'thn_ak_masuk' => 'required|max:5',
            'thn_ak_lulus' => 'required|max:5',
            'ipk' => 'required|numeric',
            'email' => 'nullable|email|max:100',
            'handphone' => 'nullable|max:50',
            'alamat' => 'nullable|max:255',
            'id_status_aktif_mhs' => 'required|integer',
            'foto' => 'nullable|file|image|max:2048', // max dalam kilobyte (2048 KB = 2 MB)
        ];
    }
}
