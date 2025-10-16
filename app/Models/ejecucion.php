<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ejecucion extends Model
{

    public $timestamps = false;

    protected $table = 'ejecucion';
    protected $primaryKey = 'id_ejecucion';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'num_ejecucion',
        'id_clavado',
        'id_clavadista',
        'id_cal_participante',
        'id_cal_juez',
        'descripcion',
        'dificultad',
        'created',
        'created_by',
        'modified',
        'modified_by',
        'deleted',
        'deleted_by',
        'active',
        'stop'
    ];
}
