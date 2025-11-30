<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CalJuez;
use App\Models\CalParticipante;
use App\Models\clavado;
use App\Models\ejecucion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalJuezController extends Controller
{
    public function save_check_judge(Request $request)
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $CalParticipante = CalJuez::create([
            'id_usuario' => $userId, //se agrega el id del usuario que inicio sesión  
            'calificacion' => (float) $request->check,
            'j1' => $request->c1,
            'j2' => $request->c2,
            'j3' => $request->c3,
            'j4' => $request->c4,
            'j5' => $request->c5,
            'j6' => $request->c6,
            'j7' => $request->c7,
            /*'j8'=>$request->C,
            'j9'=>$request->C,
            'j10',
            'j11',
            'j12',*/
            'divepoints' => $request->dive_points,
            'totalpoints' => $request->total_points,
            'created' => Carbon::now()->toDateTimeString(),
            //'created_by' =>,//se agrega id de usuario login
            'id_ejecucion' => $request->id_ejecucion
        ]);

        return redirect('/add_responce_judge')
            ->with('success', 'Registro agregado correctamente.');
    }

    public function viewResult()
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $clavados = Clavado::select('id_clavado', 'evento', 'fecha', 'total_rondas', DB::raw('0 as point'),'sincronizacion')
            ->whereIn('id_clavado', function ($query) use ($userId) {
                $query->select('ejecucion.id_clavado')
                    ->from('cal_participante')
                    ->leftJoin('ejecucion', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
                    ->where('cal_participante.id_usuario', $userId);
            })
            ->get();

        $points = DB::table('ejecucion')
            ->leftJoin('cal_participante', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->where('cal_participante.id_usuario', $userId)
            ->whereRaw('
        (CAST(cal_participante.calificacion AS DECIMAL(10,1)) * 3 * ejecucion.dificultad)
            = CAST(cal_juez.divepoints AS DECIMAL(10,1))
    ')
            ->groupBy('ejecucion.id_clavado')
            ->select('ejecucion.id_clavado', DB::raw('COUNT(*) AS total_matches'))
            ->pluck('total_matches', 'ejecucion.id_clavado');


        foreach ($clavados as $clavado) {
            $clavado->point = $points[$clavado->id_clavado] ?? 0;
        }

        $total_points = DB::table('ejecucion')
            ->leftJoin('cal_participante', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->where('cal_participante.id_usuario', $userId)
            ->whereRaw('
        (CAST(cal_participante.calificacion AS DECIMAL(10,1)) * 3 * ejecucion.dificultad)
            = CAST(cal_juez.divepoints AS DECIMAL(10,1))
    ')
            ->count();



        //return $clavados;die;

        return view('user.content.maincontent.all_torneos_result', compact('clavados', 'total_points'));
    }

    public function athleteList($id_clavado)
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $clavado = Clavado::select('id_clavado', 'evento', 'fecha', 'total_rondas', 'sincronizacion')
            ->where('id_clavado', $id_clavado)
            ->first();

        $athlete = DB::table('ejecucion')
            ->leftJoin('clavadista', 'ejecucion.id_clavadista', '=', 'clavadista.id_clavadista')
            ->where('ejecucion.id_clavado', $id_clavado)
            ->whereIn('ejecucion.id_ejecucion', function ($query) use ($userId) {
                $query->select('id_ejecucion')
                    ->from('cal_participante')
                    ->where('id_usuario', $userId);
            })
            ->orderBy('ejecucion.num_ejecucion', 'ASC')
            ->select(
                'ejecucion.id_ejecucion',
                'ejecucion.num_ejecucion',
                'ejecucion.id_clavado',
                'ejecucion.id_clavadista',
                'ejecucion.id_cal_participante',
                'ejecucion.id_cal_juez',
                'ejecucion.descripcion',
                'ejecucion.dificultad',
                'ejecucion.active',
                'ejecucion.stop',
                'clavadista.orden',
                'clavadista.nombre',
                'clavadista.pais_region',
                'clavadista.active as clavadista_active'
            )
            ->get();

        $ejecuciones = DB::table('ejecucion')
            ->leftJoin('clavadista', 'ejecucion.id_clavadista', '=', 'clavadista.id_clavadista')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->leftJoin('cal_participante', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->where('ejecucion.id_clavado', $id_clavado)
            ->where('cal_participante.id_usuario', $userId)
            ->where('cal_participante.calificacion', '!=', null)
            ->orderBy('ejecucion.num_ejecucion', 'ASC')
            ->select(
                'ejecucion.id_ejecucion',
                'ejecucion.num_ejecucion',
                'ejecucion.id_clavado',
                'ejecucion.id_clavadista',
                'ejecucion.descripcion',
                'ejecucion.dificultad',
                'clavadista.orden',
                'clavadista.nombre',
                'cal_juez.j1',
                'cal_juez.j2',
                'cal_juez.j3',
                'cal_juez.j4',
                'cal_juez.j5',
                'cal_juez.j6',
                'cal_juez.j7',
                'cal_juez.divepoints',
                'cal_participante.calificacion'
            )
            ->get();

        //return $ejecuciones;die;

        return view('user.content.maincontent.athlete_list', compact('athlete', 'ejecuciones', 'clavado'));
    }

    public function athleteResult($id_clavadista, $id_clavado)
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $datos = DB::table('ejecucion')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->leftJoin('cal_participante', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->where('id_clavadista', $id_clavadista)
            ->where('id_clavado', $id_clavado)
            ->where('cal_participante.id_usuario', $userId)
            ->select(
                'ejecucion.num_ejecucion',
                'ejecucion.descripcion',
                'ejecucion.dificultad',
                'cal_juez.j1',
                'cal_juez.j2',
                'cal_juez.j3',
                'cal_juez.j4',
                'cal_juez.j5',
                'cal_juez.j6',
                'cal_juez.j7',
                'cal_juez.divepoints',
                'cal_participante.calificacion',
                'cal_participante.id_usuario'
            )
            ->get();

        return response()->json([
            'status' => 'ok',
            'resultado' => $datos
        ]);
    }
}
