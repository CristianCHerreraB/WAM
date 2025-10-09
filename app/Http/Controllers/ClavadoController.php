<?php

namespace App\Http\Controllers;

use App\Models\clavado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClavadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function divesInLive()
    {
        // $clavados = clavado::query()->where('active', 0)->first();
        $clavados = DB::table('clavadista')
            ->join('clavado', function ($join) {
                $join->on('clavado.id_clavadista', '=', 'clavadista.id_clavadista')
                    ->where('clavado.active', 0);
            })
            ->select('clavadista.nombre', 'clavadista.apellido_p', 'clavadista.apellido_m', 'clavadista.pais_region', 'clavado.id_clavado', 'clavado.active', 'clavado.num_clavado', 'clavado.stop')
            ->first();

        return response()->json([
            'status' => 'ok',
            'resultado' => $clavados
        ]);
    }

    public function index()
    {
        // $clavados = clavado::query()->where('active', 0)->first();
        $clavados = DB::table('clavadista')
            ->join('clavado', function ($join) {
                $join->on('clavado.id_clavadista', '=', 'clavadista.id_clavadista')
                    ->where('clavado.active', 0);
            })
            ->select('clavadista.nombre', 'clavadista.apellido_p', 'clavadista.apellido_m', 'clavadista.pais_region', 'clavado.id_clavado', 'clavado.active', 'clavado.num_clavado', 'clavado.stop')
            ->first();

        return response()->json([
            'status' => 'ok',
            'resultado' => $clavados
        ]);
    }

    public function changeStop($id)
    {
        $clavados = clavado::query()->where('id_clavado', $id)->first();
        if ($clavados->stop == 0) {
            $clavados->stop = 1;
        } else {
            $clavados->stop = 0;
        }
        $clavados->save();

        return response()->json([
            'status' => 'ok',
            'resultado' => $clavados
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'num_clavado' => 'required',
            'evento' => 'nullable',
            'fecha' => 'required',
            //'created' => 'required',
            //'created_by' => 'required',
            'nombre_clavado' => 'required',
            'descripcion' => 'nullable',
            'dificultad' => 'required',
            'sincronizacion' => 'required'

        ]);

        $dive = clavado::create($validated);


        return redirect('all_dive/' . $dive->clasificacion)
            ->with('success', 'Registro agregado correctamente.');
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
}
