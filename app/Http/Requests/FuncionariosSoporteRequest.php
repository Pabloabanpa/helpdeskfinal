<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosSoporteRequest extends FormRequest
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
			'funcionario_id' => 'required',
			'username' => 'required|string',
            'password' => 'required|string|min:6', // Asegurar que se ingrese una contraseña válida
            'email_inst' => 'required|string',
			'rol_id' => 'required',
            'estado' => 'required|in:activo,inactivo',
			'fecha_creacion' => 'required',
        ];
    }
}
