<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nombre de la tabla personalizada
     */
    protected $table = 'usuarios';

    /**
     * Clave primaria personalizada
     */
    protected $primaryKey = 'id_usuario';

    /**
     * Indica si el modelo debe usar timestamps automáticos
     */
    public $timestamps = false;

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'usuario',
        'correo',
        'password',
        'nombre',
        'apellido_p',
        'apellido_m',
        'id_nivel_usuario',
        'active',
        'created',
        'created_by',
        'remember_token',
    ];

    /**
     * Campos ocultos (no se incluyen en JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión de tipos
     */
    protected $casts = [
        'created' => 'date',
        'modified' => 'date',
        'deleted' => 'date',
        'active' => 'boolean',
    ];

    /**
     * Relación: Usuario pertenece a un nivel
     */
    public function nivel()
    {
        return $this->belongsTo(NivelUsuario::class, 'id_nivel_usuario', 'id_nivel_usuario');
    }

    /**
     * Obtiene el nombre del rol del usuario
     */
    public function getRolNameAttribute()
    {
        return $this->nivel?->nombre_rol;
    }

    /**
     * Verifica si el usuario tiene un rol específico
     */
    public function hasRole($roleName)
    {
        return strtolower($this->rol_name) === strtolower($roleName);
    }

    /**
     * Verifica si el usuario es administrador
     */
    public function isAdmin()
    {
        return $this->hasRole('admin') || $this->hasRole('administrador');
    }

    /**
     * Verifica si el usuario es jugador/público
     */
    public function isPlayer()
    {
        return $this->hasRole('jugador') || $this->hasRole('publico') || $this->hasRole('público');
    }

    /**
     * Scope para usuarios activos
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Obtiene el nombre completo del usuario
     */
    public function getFullNameAttribute()
    {
        return trim("{$this->nombre} {$this->apellido_p} {$this->apellido_m}");
    }

    /**
     * Obtiene el identificador de autenticación
     */
    public function getAuthIdentifierName()
    {
        return 'id_usuario';
    }

    /**
     * Obtiene el nombre del campo de password
     */
    public function getAuthPasswordName()
    {
        return 'password';
    }

    /**
     * Nombre de la columna remember_token
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}