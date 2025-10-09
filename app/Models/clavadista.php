<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clavadista extends Model
{
    public $timestamps = false;
    
    protected $table = 'clavadista';
    protected $primaryKey = 'id_clavadista'; 
    public $incrementing = true; 
    protected $keyType = 'int';
    
    public function clavados()
{
    return $this->hasMany(Clavado::class, 'id_clavadista', 'id_clavadista');
}

}
