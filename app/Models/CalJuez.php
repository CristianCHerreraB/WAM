<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalJuez extends Model
{
    //
    
     public $timestamps = false;
    protected $table = 'cal_juez';
    protected $primaryKey = 'id_cal_juez';
    public $incrementing = true;
    protected $keyType = 'int';

       protected $fillable = [
        'id_cal_juez',
        'j1',
        'j2',
        'j3',	
        'j4',	
        'j5',	
        'j6',	
        'j7',	
        'j8',	
        'j9',	
        'j10',	
        'j11',	
        'j12',	
        'divepoints',	
        'totalpoints',	
        'created',	
        'created_by',	
        'modified',	
        'modified_by',	
        'deleted',	
        'deleted_by',	
        'active',
        'id_ejecucion'
    ];
}
