<div class="results-table-container">
    <h5>Atletas que participan</h5>
    @php
    $ronda = $item['ejecuciones'][0]->num_ejecucion;
    @endphp
    <h5>Ronda en curso: {{$ronda}} de {{$item->total_rondas}} </h5>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $fila= 0; @endphp
                    @foreach($item->ejecuciones->sortBy('orden') as $ejecucion )
                    @if($ejecucion->num_ejecucion == $ronda)
                    <tr>
                        <td><strong>{{ $ejecucion->orden }}</strong></td>
                        <td>{{ $ejecucion->nombre }}</td>
                        <td>{{ $ejecucion->descripcion }}</td>
                        <td>{{ $ejecucion->dificultad }}</td>
                        @if($fila == 0)
                        @if($ejecucion->stop==0)
                        <td><a href="/changeStop/{{$ejecucion->id_ejecucion}}" class="btn btn-primary">Start</a></td>
                        <!--<td><a href="#" id="start" class="btn btn-primary">Start</a></td>-->
                        @endif
                        @if($ejecucion->stop==1)
                        <td><a href="/changeStop/{{$ejecucion->id_ejecucion}}" class="btn btn-primary">Stop </a></td>
                        @endif
                        @else
                        <td></td>
                        @endif
                        @php $fila++; @endphp
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Versión móvil -->
    <div class="d-md-none">
        @foreach($item->ejecuciones as $participant)
        <div class="card mb-2">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $ejecucion->orden }}</strong>
                        <div class="text-muted small">{{ $ejecucion->nombre }} </div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-primary">{{ $ejecucion->descripcion }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#start').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/changeStop/{{$ejecucion->id_ejecucion}}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    console.log('sendForm:', data);
                },
                error: function(xhr, status, error) {
                    console.log('sendForm:', error);
                }
            });
        });
    });
</script>
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