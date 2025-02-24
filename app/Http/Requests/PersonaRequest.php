<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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
			'nombre_persona' => 'required|string',
			'apellido_persona' => 'required|string',
			'email_persona' => 'string',
			'telefono_persona' => 'required|string',
			'ci_persona' => 'required|string',
			'direccion_persona' => 'string',
			'fecha_nacimiento_persona' => 'required',
        ];
    }
}
