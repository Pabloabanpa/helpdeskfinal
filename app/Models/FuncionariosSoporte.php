<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FuncionariosSoporte
 *
 * @property $id
 * @property $funcionario_id
 * @property $username
 * @property $password
 * @property $rol_id
 * @property $estado
 * @property $fecha_creacion
 * @property $created_at
 * @property $updated_at
 * @property Funcionario $funcionario
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FuncionariosSoporte extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['funcionario_id', 'username','password','rol_id', 'estado', 'fecha_creacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function funcionario()
    {
        return $this->belongsTo(\App\Models\Funcionario::class, 'funcionario_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'rol_id', 'id');
    }

}
