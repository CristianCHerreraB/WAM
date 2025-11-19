<div class="results-table-container">
    @php
    $ronda = $athlete[0]->num_ejecucion;
    $decrement = $athlete->count();
    @endphp


    @foreach($athlete->sortBy('orden') as $ejecucion)
    @if($ejecucion->num_ejecucion == $ronda)
    <div class="competition-item">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
                <label class="form-check-label">{{ $ejecucion->orden }}</label>
                <label class="form-check-label">{{ $ejecucion->nombre }}</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Ronda</th>
                            <th>Descripcion</th>
                            <th>Dificultad</th>
                            <th>J1</th>
                            <th>J2</th>
                            <th>J3</th>
                            <th>J4</th>
                            <th>J5</th>
                            <th>J6</th>
                            <th>J7</th>
                            <th>Puntos Juez</th>
                            <th>Calificación</th>
                            <th>Puntos</th>
                        </tr>
                    </thead>
                    <tbody class="result-body">
                        @foreach($ejecuciones as $item)
                        @if($item->nombre == $ejecucion->nombre)
                        <tr>
                            <td>{{$item->num_ejecucion}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->dificultad}}</td>
                            <td>{{$item->j1}}</td>
                            <td>{{$item->j2}}</td>
                            <td>{{$item->j3}}</td>
                            <td>{{$item->j4}}</td>
                            <td>{{$item->j5}}</td>
                            <td>{{$item->j6}}</td>
                            <td>{{$item->j7}}</td>
                            <td>{{number_format($item->divepoints,2)}}</td>
                            <td style='{{ number_format(($item->calificacion * 3 * $item->dificultad),1) == number_format($item->divepoints,1) ? "background: #27F54D;" : "" }}'>{{number_format($item->calificacion,1)}}</td>
                            <td>{{ floor(($item->calificacion * 3 * $item->dificultad) * 100) / 100 }}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @endif
    @endforeach

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .results-table-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 15px;
        border: 1px solid #dee2e6;
    }

    .table th {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .table td {
        vertical-align: middle;
    }

    .badge {
        font-size: 0.8rem;
    }


    @media (max-width: 768px) {
        .results-table-container {
            padding: 10px;
        }

        /*.card-body {
            padding: 0.75rem;
        }*/
    }
</style>