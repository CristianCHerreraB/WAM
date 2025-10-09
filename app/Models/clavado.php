<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clavado extends Model
{
    public $timestamps = false;
    
    protected $table = 'clavado';
    protected $primaryKey = 'id_clavado'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 
    public function clavadista()
{
    return $this->belongsTo(Clavadista::class, 'id_clavadista', 'id_clavadista');
}

}
