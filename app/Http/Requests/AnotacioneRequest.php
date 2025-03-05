<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnotacioneRequest extends FormRequest
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
			'atencion_id' => 'required',
            'funcionarios_soportes_id' => 'required',
			'descripcion' => 'string',
			'material_usado' => 'string',
			'fecha_creacion' => 'required',
        ];
    }
}
