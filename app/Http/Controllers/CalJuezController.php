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
        $userId = Auth::user()->id_usuario;
        if (!$userId) {
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
        $userId = Auth::user()->id_usuario;
        if (!$userId) {
            return redirect()->route('login');
        }

        /* $clavados = clavado::query()
            ->select('id_clavado', 'evento', 'total_rondas', 'fecha', 'active')
            ->where('active', 1) //Muestra el listado de jusgos activos o inactivos, muestra todos si no se agrega esta linea 
            ->orderBy('id_clavado', 'desc')
            ->get();*/

        $userId = Auth::user()->id_usuario;
        if (!$userId) {
            return redirect()->route('login');
        }
        $clavados = Clavado::select('id_clavado', 'evento', 'fecha', 'total_rondas')
            ->whereIn('id_clavado', function ($query) use ($userId) {
                $query->select('ejecucion.id_clavado')
                    ->from('cal_participante')
                    ->leftJoin('ejecucion', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
                    ->where('cal_participante.id_usuario', $userId);
            })
            ->get();



        //return $clavados;die;

        return view('user.content.maincontent.all_torneos_result', compact('clavados'));
    }

    public function athleteList($id_clavado)
    {

        $userId = Auth::user()->id_usuario;
        if (!$userId) {
            return redirect()->route('login');
        }

        $ejecuciones = DB::table('ejecucion')
            ->leftJoin('clavadista', 'ejecucion.id_clavadista', '=', 'clavadista.id_clavadista')
            ->where('ejecucion.id_clavado', $id_clavado)
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

        return view('user.content.maincontent.athlete_list', compact('ejecuciones'));
    }

    public function athleteResult($id_clavadista, $id_clavado)
    {
        $userId = Auth::user()->id_usuario;
        if (!$userId) {
            return redirect()->route('login');
        }

        $datos = DB::table('ejecucion')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->leftJoin('cal_participante', 'cal_participante.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->where('id_clavadista', $id_clavadista)
            ->where('id_clavado', $id_clavado)
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
                'cal_participante.calificacion'
            )
            ->get();

        return response()->json([
            'status' => 'ok',
            'resultado' => $datos
        ]);
    }
}
