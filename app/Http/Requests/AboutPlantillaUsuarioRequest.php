<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutPlantillaUsuarioRequest extends FormRequest
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
            'plantilla_usuario_id'=>'required|unique:about_plantilla_usuarios,plantilla_usuario_id',
            'imagen'=>'required|image|max:1024|extensions:jpg,jpeg,png',
            'nombre_completo'=>'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'provincial'=>'required|string',
            'poblacion'=>'required|string',
            'num_contacto'=>'required|string',
            'nacimiento'=>'required|string',
            'dip_viajar'=>'required|string',
            'incorporacion'=>'required|string',
        ];
    }
}

