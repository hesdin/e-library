<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopikRequest extends FormRequest
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
            'topik' => 'required',
            'deskripsi' => 'required',
        ];
    }

    public function messages()
    {
           return [
                'topik.required' => 'kolom topik tidak boleh kosong.',
                'deskripsi.required' => 'kolom deskripsi tidak boleh kosong.',
            ]; 
    }
}
