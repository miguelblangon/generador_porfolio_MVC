<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroduccionPlantillaUsuarioRequest extends FormRequest
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
            'plantilla_usuario_id'=>'required|unique:introduccion_plantilla_usuarios,plantilla_usuario_id',
            'imagen'=>'required|image|max:1024|extensions:jpg,png',
            'frase_introductoria'=>'required|string|max:250'
        ];
    }
}

