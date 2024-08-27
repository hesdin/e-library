<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenagaKependidikanRequest extends FormRequest
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
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nuptk' => 'required',
            'status_kepegawaian' => 'required',
            'jabatan' => 'required'
        ];
    }

    public function messages()
    {
           return [
                'nip.required' => 'kolom nip tidak boleh kosong.',
                'nama.required' => 'kolom nip tidak boleh kosong.',
                'jenis_kelamin.required' => 'kolom jenis_kelamin tidak boleh kosong.',
                'tempat_lahir.required' => 'kolom tempat lahir tidak boleh kosong.',
                'tanggal_lahir.required' => 'kolom tanggal lahir tidak boleh kosong.',
                'nuptk.required' => 'kolom nuptk tidak boleh kosong.',
                'status_kepegawaian.required' => 'kolom status kepegawaian tidak boleh kosong.',
                'jabatan.required' => 'kolom jabatan tidak boleh kosong.',
            ]; 
        
    }
}
