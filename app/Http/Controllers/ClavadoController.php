<?php

namespace App\Http\Controllers;

use App\Models\clavado;
use App\Http\Controllers\Controller;
use App\Models\CalParticipante;
use App\Models\clavadista;
use App\Models\ejecucion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ClavadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function divesInLive()
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $exists = false;
        // $clavados = clavado::query()->where('active', 0)->first();
        $clavados =  DB::table('ejecucion')
            ->select()
            ->leftJoin('clavado', 'ejecucion.id_clavado', '=', 'clavado.id_clavado')
            ->leftJoin('clavadista', 'ejecucion.id_clavadista', '=', 'clavadista.id_clavadista')
            //->where('clavado.id_clavado', 4)
            //->where('ejecucion.orden', 1)
            ->where('ejecucion.active', 0)
            ->where('ejecucion.stop', 1)
            ->select('ejecucion.*', 'clavado.*', 'clavadista.*')
            ->first();
        //return $clavados;die;
        if ($clavados && $clavados->id_ejecucion != null) {
            $exists = CalParticipante::query()
                ->select('id_cal_participante', 'id_usuario', 'id_ejecucion')
                ->where('id_ejecucion', $clavados->id_ejecucion)
                //->where('id_usuario', 2)
                ->first();
        }
        // return !empty($exists);
        if ($exists != false) {
            return response()->json([
                'status' => 'ok',
                'resultado' => false
            ]);
        }


        return response()->json([
            'status' => 'ok',
            'resultado' => $clavados
        ]);
    }

    public function index()
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $clavados = Clavado::query()
            ->select('id_clavado', 'evento', 'total_rondas', 'fecha', 'active')
            //->where('active', 0) //Muestra el listado de jusgos activos o inactivos, muestra todos si no se agrega esta linea 
            //->where('created_by',/*id usuario*/)//mostrar torneos por usuario admin
            ->orderBy('id_clavado', 'desc')
            ->get();

        foreach ($clavados as $clavado) {
            $ejecuciones = DB::table('ejecucion')
                ->leftJoin('clavadista', 'ejecucion.id_clavadista', '=', 'clavadista.id_clavadista')
                ->where('ejecucion.id_clavado', $clavado->id_clavado)
                ->where('ejecucion.active', 0)
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

            $clavado->ejecuciones = $ejecuciones;
        }

        // return $clavados;die;
        return view('user.content.maincontent.all_torneos_en_curso', compact('clavados'));
    }

    public function changeStop($id, $status)
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $ejecucion = ejecucion::query()->where('id_ejecucion', $id)->first();
        if ($ejecucion->stop == 0) {
            $ejecucion->stop = 1;
        } else {
            $ejecucion->stop = 2;
            $ejecucion->active = 1;
        }
        //return $status;die;
        if ($status == true) {
            $clavado = Clavado::find($ejecucion->id_clavado);
            if ($clavado) {
                $clavado->active = 1;
                $clavado->save();
            }
        }

        $ejecucion->save();

        return redirect('/all_dives')
            ->with('success', 'Registro agregado correctamente.');
        /* return response()->json([
            'status' => 'ok',
            'resultado' => '{stop:' . $ejecucion->stop . '}',
        ]);*/
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $clavado = clavado::create([
            'evento' => $request->evento,
            'total_rondas' => $request->total_rondas,
            'fecha' => $this->normalizeDate($request->fecha),
            'sincronizacion' => $request->sincronizacion,
            'created' => Carbon::now()->format('Y-m-d'),
            //'created_by'=> agregar usuarioid
        ]);

        foreach ($request->orden as $key => $value) {
            $clavadista = clavadista::create([
                'orden' => $request->orden[$key],
                'nombre' => $request->nombre[$key],
                'pais_region' => $request->pais_region[$key],
                'created' => Carbon::now()->format('Y-m-d'),
                //'created_by' => '',
            ]);

            $count = 1;
            foreach ($request->dive[$key] as $index => $descripcion) {
                $dificultad = $request->dificultad[$key][$index] ?? null;
                ejecucion::create([
                    'num_ejecucion' => $count,
                    'id_clavado' => $clavado->id_clavado,
                    'id_clavadista' => $clavadista->id_clavadista,
                    'descripcion' => $descripcion,
                    'dificultad' => $dificultad,
                ]);
                $count++;
            }
        }

        return redirect('/all_dives')
            ->with('success', 'Registro agregado correctamente.');
    }

    private function normalizeDate($value): ?string
    {
        if (empty($value)) return null;

        if (is_numeric($value)) {
            try {
                return Date::excelToDateTimeObject($value)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        $timestamp = strtotime($value);
        return $timestamp !== false ? date('Y-m-d', $timestamp) : null;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(clavado $clavado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clavado $clavado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clavado $clavado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clavado $clavado)
    {
        //
    }

    public function addResult()
    {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id_usuario;
        } else {
            return redirect()->route('login');
        }

        $clavados = //Clavado::where('active', 0)
            Clavado::orderBy('id_clavado', 'desc')
            ->first();


        $ejecuciones = DB::table('ejecucion')
            ->leftJoin('clavadista', 'ejecucion.id_clavadista', '=', 'clavadista.id_clavadista')
            ->leftJoin('cal_juez', 'cal_juez.id_ejecucion', '=', 'ejecucion.id_ejecucion')
            ->where('ejecucion.id_clavado', $clavados->id_clavado)
            //->where('ejecucion.stop', 1)
            //->where('ejecucion.active', 1)
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
                'clavadista.active as clavadista_active',
                'cal_juez.id_ejecucion as id_ejecucion_juez'
            )
            ->get();
        //return $ejecuciones; die;
        //return $clavados;die;
        return view('user.content.maincontent.add_result_judge', compact('clavados', 'ejecuciones'));
    }
}
