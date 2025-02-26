<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Atencione
 *
 * @property $id
 * @property $solicitud_id
 * @property $funcionarios_soportes_id
 * @property $descripcion
 * @property $estado
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property FuncionariosSoporte $funcionariosSoporte
 * @property Solicitude $solicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Atencione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['solicitud_id', 'funcionarios_soportes_id', 'descripcion', 'estado', 'fecha_inicio', 'fecha_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function funcionariosSoporte()
    {
        return $this->belongsTo(\App\Models\FuncionariosSoporte::class, 'funcionarios_soportes_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitude()
    {
        return $this->belongsTo(\App\Models\Solicitude::class, 'solicitud_id', 'id');
    }
    
}
