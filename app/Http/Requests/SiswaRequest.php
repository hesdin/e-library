<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'kelas_id' => 'required',
            'nipd' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_whatsaap' => 'required',
            'nama_wali' => 'nullable',
            'pekerjaan_wali' => 'nullable',
            'penghasilan_wali' => 'nullable'
        ];
    }

    public function messages()
    {
           return [
                'kelas_id.required' => 'kolom kelas tidak boleh kosong.',
                'nipd.required' => 'kolom nipd tidak boleh kosong.',
                'nama.required' => 'kolom nipd tidak boleh kosong.',
                'nisn.required' => 'kolom nisn tidak boleh kosong.',
                'jenis_kelamin.required' => 'kolom jenis kelamin tidak boleh kosong.',
                'tempat_lahir.required' => 'kolom tempat lahir tidak boleh kosong.',
                'tanggal_lahir.required' => 'kolom tanggal lahir tidak boleh kosong.',
                'alamat.required' => 'kolom alamat tidak boleh kosong.',
                'nomor_whatsaap.required' => 'kolom nomor whatsaap tidak boleh kosong.',
            ]; 
    }
}
