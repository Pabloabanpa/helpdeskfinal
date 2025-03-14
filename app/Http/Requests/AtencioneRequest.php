<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtencioneRequest extends FormRequest
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
            'solicitud_id' => 'required|integer|exists:solicitudes,id',
            'funcionario_id' => 'nullable|integer|exists:funcionarios,id',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|in:en espera,en proceso,finalizada,cancelada',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ];
    }
}
