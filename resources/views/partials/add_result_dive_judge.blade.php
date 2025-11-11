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

        .card-body {
            padding: 0.75rem;
        }
    }

    button.accordion-button.collapsed {
        padding: 10px;
        background-color: transparent !important;
    }


    .accordion-button::after {
        content: "+";
        font-size: 1.3rem;
        font-weight: bold;
        color: #0d6efd;
        margin-left: auto;
        background-image: none !important;
        transform: none !important;
        transition: color 0.2s ease;
    }

    .accordion-button:not(.collapsed)::after {
        content: "–";
        color: #0a58ca;
        border-color: transparent !important;
        transform: none !important;
    }

    button.accordion-button {
        padding: 10px;
        background-color: transparent;
    }

    .accordion-body {
        padding: 0px;
    }
</style>


<div class="table-responsive">
    @php
    $index_aux=0;
    @endphp

    @for($i=1 ;$i <= $clavados->total_rondas;$i++)
        <div>
            <h7>Ronda # {{$i}}</h7>
        </div>
        @foreach($ejecuciones->sortBy('orden') as $index => $participant)
        @if( $participant->num_ejecucion == $i)
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <div class="list-group">
                    <h2 class="accordion-header list-group-item list-group-item-action">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{ $index_aux }}" aria-expanded="false" aria-controls="flush-collapseOne">
                            {{ $participant->orden }} | <img class="d-flex justify-content-start" src="/flags/4x3/{{ $participant->pais_region }}.svg" width="32" height="20" alt="MX">
                            | Nombre: {{ $participant->nombre }} | Clavado: {{ $participant->descripcion }} | Dificultad: {{ $participant->dificultad }}
                        </button>
                    </h2>
                </div>
                <div id="flush-collapseOne-{{ $index_aux }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card card-body">
                            @if($participant->id_ejecucion_juez==null)
                            <form action="/save_check_judge" method="post">
                                @csrf
                                <div class="row g-3">
                                    <input type="text" value="{{ $participant->dificultad }}" id="dificultad" hidden>
                                    <input type="text" value="{{$participant->id_ejecucion}}" name="id_ejecucion" hidden>
                                    <div class="col-md-2">
                                        <label for="inputZc1" class="form-label">Resultado 1</label>
                                        <input type="text" class="form-control" name="c1" id="c1" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputZc2" class="form-label">Resultado 2</label>
                                        <input type="text" class="form-control" name="c2" id="c2" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputZc3" class="form-label">Resultado 3</label>
                                        <input type="text" class="form-control" name="c3" id="c3" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputZc4" class="form-label">Resultado 4</label>
                                        <input type="text" class="form-control" name="c4" id="c4" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputZc5" class="form-label">Resultado 5</label>
                                        <input type="text" class="form-control" name="c5" id="c5" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputZc6" class="form-label">Resultado 6</label>
                                        <input type="text" class="form-control" name="c6" id="c6" required>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-2">
                                        <label for="inputZc7" class="form-label">Resultado 7</label>
                                        <input type="text" class="form-control" name="c7" id="c7" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="divePoints" class="form-label">Puntos de clavado</label>
                                        <input type="text" class="form-control" name="dive_points" id="divePoints">
                                    </div>
                                   <!-- <div class="col-md-2">
                                        <label for="totalPoints" class="form-label">Puntos Totales</label>
                                        <input type="text" class="form-control" name="total_points" id="totalPoints">
                                    </div>-->
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="submmit">Guardar</button>
                                </div>
                            </form>
                            @else
                            <div class="row">
                                <div class="col md-12 text-center">
                                    <h4>Ya emitió su evaluación</h4>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
        $index_aux++;
        @endphp
        @endif
        @endforeach
        @endfor
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let count = 0;
    document.querySelectorAll("input[name^='c']").forEach(input => {
        input.addEventListener("input", function() {
            calcularPromedio(this.closest("form"),count);
        });
    });
});

function calcularPromedio(form,count) {
    const valores = Array.from(form.querySelectorAll("input[name^='c']"))
        .map(i => parseFloat(i.value))
        .filter(v => !isNaN(v)); 

    if (valores.length === 7) {
        const dificultad = parseFloat(form.querySelector("#dificultad").value,0);
        valores.sort((a, b) => a - b);//ordenamos los valores de menor a mayor
        const midelvalue = valores.slice(2, 5);//quitamos los valores que no se suman
        const promedio = midelvalue.reduce((a, b) => a + b, 0)*dificultad; // midelvalue.length;//calculamos promedio
        form.querySelector("#divePoints").value = promedio.toFixed(2);
       
    }
}
</script>
