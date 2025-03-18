<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    protected $perPage = 20;

    protected $fillable = [
        'funcionario_id',
        'equipo_id',
        'descripcion_solicitud',
        'archivo',
        'estado',
        'fecha_creacion',
        'tipo_solicitud'
    ];

    protected $casts = [
        'fecha_creacion' => 'date', // Convierte la fecha automáticamente
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'id');
    }
}
