<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CalParticipante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;

class cal_participante extends Controller
{
    public function save_check(Request $request)
    {
        //return $request->id_ejecucion;
        $CalParticipante = CalParticipante::create([
            'id_usuario' => 2, //se agrega el id del usuario que inicio sesión  
            'calificacion' => (Float) $request->check,
            'created' => Carbon::now()->toDateTimeString(),
            'created_by' => 1,//se agrega el id del usuario que inicio sesión
            'id_ejecucion' => $request->id_ejecucion,
            'active'=>1,
        ]);

        return response()->json([
            'status' => 'ok',
            'resultado' => $CalParticipante
        ]);
    }
}
