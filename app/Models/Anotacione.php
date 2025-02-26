<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Anotacione
 *
 * @property $id
 * @property $atencion_id
 * @property $funcionarios_soportes_id
 * @property $descripcion
 * @property $material_usado
 * @property $fecha_creacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Atencione $atencione
 * @property FuncionariosSoporte $funcionariosSoporte
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anotacione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['atencion_id', 'funcionarios_soportes_id', 'descripcion', 'material_usado', 'fecha_creacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function atencione()
    {
        return $this->belongsTo(\App\Models\Atencione::class, 'atencion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function funcionariosSoporte()
    {
        return $this->belongsTo(\App\Models\FuncionariosSoporte::class, 'funcionarios_soportes_id', 'id');
    }
    
}
