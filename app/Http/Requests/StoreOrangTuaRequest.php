<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrangTuaRequest extends FormRequest
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
        return [
            //
            'nim' => 'required|string|max:16|exists:siap_mhs,nim',
            'nama_ortu'        => 'nullable|string|max:50',
            'nik_ortu'         => 'required|string|max:255',
            'id_agama'         => 'nullable|integer',
            'id_pendidikan'    => 'nullable|string|size:2',
            'id_pekerjaan'     => 'nullable|string|size:1',
            'id_status_hidup'  => 'nullable|string|size:1',
            'id_penghasilan'   => 'nullable|integer|min:0',
            'id_kabupaten'     => 'required|string|max:10',
            'id_prov'          => 'required|string|max:9',
            'negara_ortu'      => 'nullable|string|max:50',
            'handphone_ortu'   => 'nullable|string|max:50',
            'email_ortu'       => 'nullable|email|max:100',
            'tgl_lahir_ortu'   => 'nullable|date',
            'id_hubungan'      => 'nullable|integer',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        // Log detail error
        Log::error('Validasi StoreOrtuRequest gagal', [
            'errors' => $validator->errors()->toArray(),
            'input' => $this->all(),
        ]);

        // Return response normal Laravel
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
