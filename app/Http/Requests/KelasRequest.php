<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'wali_kelas_id' => 'required',
            'kelas' => 'required',
            'tingkatan' => 'required',
        ];
    }

    public function messages()
    {
           return [
                'wali_kelas_id.required' => 'kolom wali kelas tidak boleh kosong.',
                'kelas.required' => 'kolom kelas tidak boleh kosong.',
                'tingkatan.required' => 'kolom tingkatan tidak boleh kosong.',
            ]; 
    }
}
