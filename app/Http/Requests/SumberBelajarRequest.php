<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SumberBelajarRequest extends FormRequest
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
            'topik_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'judul' => 'required',
            'tingkatan' => 'required',
            'kategori' => 'required',
            'youtube_url' => 'nullable',
            'file_url' => 'nullable',
            'deskripsi' => 'required'
        ];
    }

    public function messages()
    {
           return [
                'topik_id.required' => 'kolom topik tidak boleh kosong.',
                'mata_pelajaran_id.required' => 'kolom mata pelajaran tidak boleh kosong.',
                'judul.required' => 'kolom judul tidak boleh kosong.',
                'tingkatan.required' => 'kolom tingkatan tidak boleh kosong.',
                'kategori.required' => 'kolom kategori tidak boleh kosong.',
                'deskripsi.required' => 'kolom deskripsi tidak boleh kosong.',
            ]; 
    }
}
