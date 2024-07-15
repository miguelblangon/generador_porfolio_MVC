<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'plantilla_usuario_id'=>'required',
            'nombre'=>'required|string|max:250',
            'categoria'=>'required|string|max:250',
            'year_fin'=>'required|string',
            'tutor'=>'required|string|max:250',
            'descripcion'=>'required|string',
            'url'=>'required|string|max:250',

        ];
    }
}

