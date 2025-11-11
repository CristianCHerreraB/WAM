<div class="results-table-container">
    @php
    $ronda = $ejecuciones[0]->num_ejecucion;
    $decrement = $ejecuciones->count();
    @endphp


        @foreach($ejecuciones->sortBy('orden') as $ejecucion)
        @if($ejecucion->num_ejecucion == $ronda)
        <div class="competition-item">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="form-check">
                    <label class="form-check-label">{{ $ejecucion->orden }}</label>
                    <label class="form-check-label">{{ $ejecucion->nombre }}</label>
                </div>

                <button
                    class="btn btn-sm btn-outline-primary btn-getResult"
                    data-id_clavadista="{{ $ejecucion->id_clavadista }}"
                    data-id_clavado="{{ $ejecucion->id_clavado }}"
                    data-bs-toggle="collapse"
                    data-bs-target="#results{{ $ejecucion->id_clavadista }}"
                    aria-expanded="false"
                    aria-controls="results{{ $ejecucion->id_clavadista }}">
                    <i class="fas fa-chevron-down"></i> Ver
                </button>
            </div>

            <div class="collapse" id="results{{ $ejecucion->id_clavadista }}">
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
                            <tbody class="result-body"></tbody>
                        </table>
                    </div>
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