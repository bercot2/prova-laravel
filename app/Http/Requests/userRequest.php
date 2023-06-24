<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    // Aqui você pode definir as regras de validação para os campos do formulário

    public function authorize()
    {
        return true; // Defina como true para permitir a validação
    }

    public function rules()
    {
        
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:1',
        ];
    }
}
