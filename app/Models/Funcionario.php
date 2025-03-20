<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Funcionario
 *
 * @property int $id
 * @property int $persona
 * @property string $username
 * @property string $password
 * @property string $email_inst
 * @property string $cargo
 * @property int $oficina
 * @property string $imagen
 * @property string $celular
 * @property string $estado
 * @property int $rol_personal
 * @property string $fecha_creacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property \App\Models\Oficina $oficina
 * @property \App\Models\Persona $persona
 * @property \App\Models\Role $role
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Funcionario extends Authenticatable
{
    use HasFactory;

    protected $table = 'funcionarios';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    
        'persona',
        'username',
        'password',
        'email_inst',
        'cargo',
        'oficina',
        'imagen',
        'celular',
        'estado',
        'rol_personal',
        'fecha_creacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Indica que el modelo no maneja timestamps automáticamente.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relación con el modelo Oficina.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oficina()
    {
        // Se asume que la columna local es 'oficina' y la columna de referencia es 'id'
        return $this->belongsTo(\App\Models\Oficina::class, 'oficina', 'id');
    }

    /**
     * Relación con el modelo Persona.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        // Se asume que la columna local es 'persona' y la columna de referencia es 'id'
        return $this->belongsTo(\App\Models\Persona::class, 'persona', 'id');
    }

    /**
     * Relación con el modelo Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        // Se asume que la columna local es 'rol_personal' y la columna de referencia es 'id'
        return $this->belongsTo(\App\Models\Role::class, 'rol_personal', 'id');
    }

    /**
     * Método utilizado por Laravel para obtener la contraseña para la autenticación.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
