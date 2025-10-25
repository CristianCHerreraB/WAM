<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    /**
     * Nombre de la tabla
     */
    protected $table = 'nivel_usuarios';

    /**
     * Clave primaria
     */
    protected $primaryKey = 'id_nivel_usuario';

    /**
     * Sin timestamps automáticos
     */
    public $timestamps = false;

    /**
     * Campos asignables
     */
    protected $fillable = [
        'nombre_rol',
        'active',
        'created',
        'created_by',
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
     * Relación: Un nivel tiene muchos usuarios
     */
    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_nivel_usuario', 'id_nivel_usuario');
    }

    /**
     * Scope para niveles activos
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}