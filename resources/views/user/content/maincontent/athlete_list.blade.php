@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      Resultados
    </div>
  </div>
  @if($ejecuciones)
  <div class="row">
    <!-- Competencias -->
    <div class="col-md-12">
      <div class="results-table-container">
        <!-- Versión desktop -->
        <!--<div class="d-none d-md-block">-->
        <div class="d-none d-md-block">
          @include('partials.list_dive_results', ['event' => 'ejecuciones'])
        </div>
      </div>
      <!-- Versión móvil -->
      <div class="d-md-none">
        @include('partials.list_dive_results', ['event' => 'ejecuciones'])
      </div>

    </div>
  </div>
  @endif
  @if($ejecuciones->isEmpty())
  <div class="row">
    <div class="col-md-12 text-center">
      <br>
      <h6>No hay resultados disponibles por el momento.</h6>
      <br>
    </div>
  </div>
  @endif
</div>




<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('.btn-getResult').on('click', function(e) {
      e.preventDefault();

      const id_clavadista = $(this).data('id_clavadista');
      const id_clavado = $(this).data('id_clavado');
      const target = $(this).attr('data-bs-target');
      const tbody = $(target).find('.result-body');

      tbody.empty();

      $.post(`/athleteResult/${id_clavadista}/${id_clavado}`, {
          _token: '{{ csrf_token() }}'
        })
        .done(data => {
          console.log('Resultado:', data.resultado);

          if (data.resultado && data.resultado.length > 0) {
            data.resultado.forEach(item => {
              let divepoints = Math.round(item.divepoints * 10) / 10;
              let calificacion = Math.round(item.calificacion * 10) / 10;
              let puntos = Math.round((item.calificacion*3*item.dificultad) * 10) / 10;
              tbody.append(`
                        <tr>
                            <td>${item.num_ejecucion ?? ''}</td>
                            <td>${item.descripcion ?? ''}</td>
                            <td>${item.dificultad ?? ''}</td>
                            <td>${item.j1 ?? '0.0'}</td>
                            <td>${item.j2 ?? '0.0'}</td>
                            <td>${item.j3 ?? '0.0'}</td>
                            <td>${item.j4 ?? '0.0'}</td>
                            <td>${item.j5 ?? '0.0'}</td>
                            <td>${item.j6 ?? '0.0'}</td>
                            <td>${item.j7 ?? '0.0'}</td>
                            <td>${divepoints ?? '0.0'}</td>
                            <td style="background-color: ${parseFloat(item.calificacion) == parseFloat(item.divepoints) ? 'green' : 'white'}; color: ${parseFloat(item.calificacion) == parseFloat(item.divepoints) ? 'white' : 'Dark'};">
                              ${item.calificacion != null ? parseFloat(item.calificacion).toFixed(1) : '0.0'}
                            </td>
                            <td>${puntos ?? '0.0'}</td>
                        </tr>
                    `);
            });
          } else {
            tbody.append('<tr><td colspan="11" class="text-center">No hay resultados</td></tr>');
          }
        })
        .fail(xhr => console.error('Error en la petición:', xhr.responseText));
    });
  });
</script>

<style>
  .competition-item {
    padding: 15px;
    border-radius: 8px;
    background-color: #f8f9fa;
    margin-bottom: 15px;
    border: 1px solid #e9ecef;
  }

  .competition-item:last-child {
    margin-bottom: 0;
  }

  .content-card {
    background-color: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .content-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  }

  .card-header {
    color: white;
    padding: 1rem 1.5rem;
    font-weight: 600;
  }

  .card-body {
    padding: 1.5rem;
  }

  .form-check-input {
    width: 1.2em;
    height: 1.2em;
    margin-top: 0.15em;
  }

  .form-check-label {
    font-size: 1rem;
    margin-left: 0.5rem;
    font-weight: 500;
  }

  .btn-sm {
    padding: 0.4rem 0.75rem;
    font-size: 0.875rem;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .competition-item {
      padding: 12px;
    }

    .card-body {
      padding: 1rem;
    }

    .welcome-title {
      font-size: 1.5rem;
    }

    h2 {
      font-size: 1.3rem;
    }
  }
</style>
@endsection