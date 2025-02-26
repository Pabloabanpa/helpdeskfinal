<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'funcionario_id',
        'equipo_id',
        'descripcion_solicitud',
        'archivo',
        'estado',
        'fecha_creacion',
        'funcionarios_soportes_id'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'id');
    }

    public function funcionarioSoporte()
    {
        return $this->belongsTo(FuncionariosSoporte::class, 'funcionarios_soportes_id', 'id');
    }

    // Método para obtener el username del funcionario de soporte
    public function getUsernameFuncionarioSoporteAttribute()
    {
        return optional($this->funcionarioSoporte)->username ?? 'Sin Username';
    }
}

