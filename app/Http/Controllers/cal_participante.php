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
        if (Auth::user()) {
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

        $ranking = DB::table('ejecucion')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->leftJoin('cal_participante', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->whereRaw('ROUND(CAST(cal_participante.calificacion AS DECIMAL(10,2)) * 3 * ejecucion.dificultad, 2) = cal_juez.divepoints')
            ->groupBy('cal_participante.id_usuario')
            ->selectRaw('
        cal_participante.id_usuario,
        SUM(CAST(cal_participante.calificacion AS DECIMAL(10,2))) AS total_calificacion,
        DENSE_RANK() OVER (
            ORDER BY SUM(CAST(cal_participante.calificacion AS DECIMAL(10,2))) DESC
        ) AS ranking
    ')
            ->orderByDesc('total_calificacion')
            ->get();

        $rank_request = 0;
        $data = ['ranking' => 0];
        foreach ($ranking as $key => $value) {
            if ($value->id_usuario == $userId) {
                $rank_request = $value->ranking;
                $data = ['ranking' => $rank_request];
            }
        }

        //return $rank_request;

        return response()->json([
            'status' => 'ok',
            'resultado' =>  $data
        ]);
    }
}
