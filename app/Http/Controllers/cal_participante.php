<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CalParticipante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Decimal;

class cal_participante extends Controller
{
    public function save_check(Request $request)
    {
        //return $request->id_ejecucion;

        $userId = null;
        if (Auth::user()->id_usuario) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $CalParticipante = CalParticipante::create([
            'id_usuario' =>  $userId, //se agrega el id del usuario que inicio sesión  
            'calificacion' => (float) $request->check,
            'created' => Carbon::now()->toDateTimeString(),
            'created_by' =>  $userId, //se agrega el id del usuario que inicio sesión
            'id_ejecucion' => $request->id_ejecucion,
            'active' => 1,
        ]);

        return response()->json([
            'status' => 'ok',
            'resultado' => $CalParticipante
        ]);
    }
}
