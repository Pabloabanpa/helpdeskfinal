<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudeRequest extends FormRequest
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
            'funcionario_id' => 'required|exists:funcionarios,id',
            'equipo_id' => 'nullable|string|max:50', // Permitir letras y números
            'descripcion_solicitud' => 'required|string|max:255',
            'archivo' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Solo PDFs y Word, máx 2MB
            'estado' => 'required|string|in:en espera,en proceso,finalizada,cancelada',
            'fecha_creacion' => 'required|date',
            'funcionarios_soportes_id' => 'nullable|exists:funcionarios_soportes,id',
            'tipo_solicitud' => 'required|string|max:255'
        ];
    }
}
