@php
// Datos de ejemplo para la tabla
$participants = [
['country' => 'USA', 'athlete' => 'Michael Johnson', 'round' => 1],
['country' => 'GER', 'athlete' => 'Thomas Müller', 'round' => 1],
['country' => 'JPN', 'athlete' => 'Yuki Tanaka', 'round' => 3],
['country' => 'AUS', 'athlete' => 'James Wilson', 'round' => 2],
['country' => 'BRA', 'athlete' => 'Carlos Silva', 'round' => 1],
['country' => 'FRA', 'athlete' => 'Pierre Dubois', 'round' => 3],
['country' => 'CAN', 'athlete' => 'Ryan Cooper', 'round' => 2],
['country' => 'GBR', 'athlete' => 'David Williams', 'round' => 1],
];
@endphp

<div class="results-table-container">
    <h5>Atletas que participan</h5>
    <h5>Ronda en curso: {{$item['ejecuciones'][0]->num_ejecucion}}</h5>
    <!-- Versión desktop -->
    <div class="d-none d-md-block">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Orden</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Dificultad</th>
                    </tr>
                </thead>
                <tbody>
                    @php $fila= 0; @endphp
                    @foreach($item->ejecuciones as $ejecucion )
                    <tr>
                        <td><strong>{{ $ejecucion->orden }}</strong></td>
                        <td>{{ $ejecucion->nombre }}</td>
                        <td>{{ $ejecucion->descripcion }}</td>
                        <td>{{ $ejecucion->dificultad }}</td>
                        @if($fila == 0)
                        @if($ejecucion->stop==0)
                        <td><a href="/changeStop/{{$ejecucion->id_ejecucion}}" class="btn btn-primary">Start</a></td>
                        @endif
                        @if($ejecucion->stop==1)
                        <td><a href="/changeStop/{{$ejecucion->id_ejecucion}}" class="btn btn-primary">Stop </a></td>
                        @endif
                        @endif
                        @php $fila++; @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Versión móvil -->
    <div class="d-md-none">
        @foreach($participants as $participant)
        <div class="card mb-2">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $participant['athlete'] }}</strong>
                        <div class="text-muted small">{{ $participant['country'] }} </div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-primary">{{ $participant['round'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .results-table-container {
            padding: 10px;
        }

        .card-body {
            padding: 0.75rem;
        }
    }
</style>