<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $nombre_persona
 * @property $apellido_persona
 * @property $email_persona
 * @property $telefono_persona
 * @property $ci_persona
 * @property $direccion_persona
 * @property $fecha_nacimiento_persona
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = ['nombre_persona', 'apellido_persona', 'email_persona', 'telefono_persona', 'ci_persona', 'direccion_persona', 'fecha_nacimiento_persona'];

     public function funcionarios()
    {
        return $this->hasOne(Funcionario::class, 'persona_id', 'id');
    }
    
    public function getNombreCompletoAttribute()
    {
        return $this->nombre_persona . ' ' . $this->apellido_persona;
    }

}
