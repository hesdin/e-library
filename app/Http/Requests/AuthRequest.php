<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function getCredentials(){
        $username = $this->get('username');
        if ($username) {
            return [
                'username' => $username,
                'password' => $this->get('password')
            ];
        }

        return $this->only('username', 'password');
    }
}
