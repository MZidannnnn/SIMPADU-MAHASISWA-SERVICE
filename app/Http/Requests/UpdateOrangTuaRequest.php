<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrangTuaRequest extends FormRequest
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
            'nim' => 'sometimes|required|string|min:10|max:10|exists:siap_mhs,nim',
            'nama_ortu'        => 'sometimes|nullable|string|max:50',
            'nik_ortu'         => 'sometimes|required|string|max:16|min:16',
            'id_agama'         => 'sometimes|nullable|integer',
            'id_pendidikan'    => 'sometimes|nullable|string|size:2',
            'id_pekerjaan'     => 'sometimes|nullable|string|size:1',
            'id_status_hidup'  => 'sometimes|nullable|string|size:1',
            'id_penghasilan'   => 'sometimes|nullable|integer|min:0',
            'id_kabupaten'     => 'sometimes|required|string|max:10',
            'id_prov'          => 'sometimes|required|string|max:9',
            'negara_ortu'      => 'sometimes|nullable|string|max:50',
            'handphone_ortu'   => 'sometimes|nullable|string|max:50',
            'email_ortu'       => 'sometimes|nullable|email|max:100',
            'tgl_lahir_ortu'   => 'sometimes|nullable|date',
            'id_hubungan'      => 'sometimes|nullable|integer',

        ];
    }
    public function failedValidation(Validator $validator)
    {
        // Log detail error
        Log::error('Validasi UpdateOrangTuaRequest gagal', [
            'errors' => $validator->errors()->toArray(),
            'input' => $this->all(),
        ]);

        // Return custom response
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
