<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurnalRequest extends FormRequest
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
            'kompetensi_id' => 'required',
            'kelas_id' => 'required',
            'materi' => 'required',
            'hasil' => 'required',
            'hadir' => 'required|numeric',
            'tidak_hadir' => 'required|numeric',
            'tanggal' => 'required|date',
            'keterangan' => 'required'
        ];
    }

    public function messages()
    {
           return [
                'kompetensi_id.required' => 'kolom kompetensi tidak boleh kosong.',
                'kelas_id.required' => 'kolom kelas tidak boleh kosong.',
                'materi.required' => 'kolom materi tidak boleh kosong.',
                'hasil.required' => 'kolom hasil tidak boleh kosong',
                'hadir.required' => 'kolom hadir tidak boleh kosong',
                'tidak_hadir.required' => 'kolom tidak hadir tidak boleh kosong',
                'tanggal.required' => 'kolom tanggal tidak boleh kosong',
                'keterangan.required' => 'kolom keterangan tidak boleh kosong'
            ]; 
    }
}
