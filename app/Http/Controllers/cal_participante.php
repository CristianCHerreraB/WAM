<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CalParticipante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function Ranking()
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $resultados = DB::select("
    SELECT 
        cp.id_usuario,
        SUM(CAST(cp.calificacion AS DECIMAL(10,2))) AS total_calificacion,
        DENSE_RANK() OVER (ORDER BY SUM(CAST(cp.calificacion AS DECIMAL(10,2))) DESC) AS ranking
    FROM cal_participante cp
    LEFT JOIN cal_juez cj ON cp.id_ejecucion = cj.id_ejecucion
    WHERE 
        CAST(cp.calificacion AS DECIMAL(10,2)) = CAST(cj.divepoints AS DECIMAL(10,2))
        AND id_usuario = ?
    GROUP BY cp.id_usuario
    ORDER BY ranking;
", [$userId]);

        //return $resultados;

         return response()->json([
            'status' => 'ok',
            'resultado' =>  $resultados[0]
        ]);
    }
}
