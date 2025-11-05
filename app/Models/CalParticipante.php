<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalParticipante extends Model
{
    public $timestamps = false;
    protected $table = 'cal_participante';
    protected $primaryKey = 'id_cal_participante';
    public $incrementing = true;
    protected $keyType = 'int';
}
