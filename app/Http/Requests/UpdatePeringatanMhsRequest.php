<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePeringatanMhsRequest extends FormRequest
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
            'id_status_peringatan'   => 'sometimes|required|string|min:1|unique:siap_peringatan_mhs,id_status_peringatan,' . $this->route('id_status_peringatan') . ',id_status_peringatan',
            'nama_status_peringatan' => 'sometimes|string|max:50',
        ];
    }
        /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // Log detail error ke laravel.log
        Log::error('Validasi UpdatePeringatanMhsRequest gagal', [
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
