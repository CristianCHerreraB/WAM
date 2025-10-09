<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CalParticipante;
use Carbon\Carbon;
use Illuminate\Http\Request;

class cal_participante extends Controller
{
    public function save_check(Request $request)
    {
        $CalParticipante = CalParticipante::query()->where('id_cal_participante', $request->id_usuario)->first();
        $CalParticipante->id_usuario = 1;//se dee agregar el id del usuario que inicio sesión  
        $CalParticipante->calificacion = $request->calificacion;
        $CalParticipante->created = Carbon::now()->toDateTimeString();
        $CalParticipante->created_by = 1;
        $CalParticipante->id_clavado = $request->id_clavado;
        $CalParticipante->save();

        return response()->json([
            'status' => 'ok',
            'resultado' => $CalParticipante
        ]);
    }
}
