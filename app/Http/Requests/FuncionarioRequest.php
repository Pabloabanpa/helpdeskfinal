<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
			'persona' => 'required',
			'username' => 'required|string',
            'password' => 'nullable|min:6',
            'oficina' => 'required',
			'email_inst' => 'required|string',
			'cargo' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'celular' => 'string',
			'estado' => 'required|string',
			'rol_personal' => 'required|string',
            'fecha_creacion' => 'required|date|before_or_equal:today', // Agregar validación de fecha
        ];
    }

}

