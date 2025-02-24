<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcionario
 *
 * @property $id
 * @property $persona
 * @property $username
 * @property $password
 * @property $email_inst
 * @property $cargo
 * @property $oficina
 * @property $imagen
 * @property $celular
 * @property $estado
 * @property $rol_personal
 * @property $fecha_creacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Oficina $oficina
 * @property Persona $persona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Funcionario extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['persona', 'username','password','email_inst', 'cargo', 'oficina', 'imagen', 'celular', 'estado', 'rol_personal', 'fecha_creacion'];


    public function oficina()
    {
        return $this->belongsTo(\App\Models\Oficina::class, 'oficinas', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'personas', 'id');
    }

    // Relación con la tabla roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_personal', 'id');
    }
}
