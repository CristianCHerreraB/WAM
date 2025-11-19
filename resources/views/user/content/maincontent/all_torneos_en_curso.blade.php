@extends('layouts.headeradmin')

@section('title', 'Dashboard')

@section('content')


<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      <i class="fas fa-trophy me-2"></i> Torneos en curso
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <!-- Competencias -->
      <div class="col-md-12">
        @if(!empty($clavados))
        @foreach ($clavados as $item)
        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving{{ $item->id_clavado }}">
              <label class="form-check-label" for="diving{{ $item->id_clavado }}">
                Evento: {{$item->evento}} |
              </label>
              <label class="form-check-label" for="diving{{ $item->id_clavado }}">
                Total de Rondas: {{$item->total_rondas}}
              </label>
            </div>
            <button class="btn btn-sm btn-outline-primary"
              data-bs-toggle="collapse"
              data-bs-target="#results{{ $item->id_clavado }}"
              aria-expanded="false"
              aria-controls="results{{ $item->id_clavado }}">
              <i class="fas fa-chevron-down"></i> Ver
            </button>
          </div>

          <div class="collapse" id="results{{ $item->id_clavado }}">
            <div class="mt-3">
              @if (!empty($item->ejecuciones) && count($item->ejecuciones) > 0)
              @include('partials.all_clavadistas', ['event' => $item])
              @else
              <div class="row">
                <div class="col md-12 text-center">
                  <h4>No existen rondas pendientes para {{$item->evento}}</h4>
                  <h6>Puede crear un nuevo juego en la seccion <a href="/view_add_dives">Configurar Rondas y Clavados</a></h6>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
    @if($clavados->isEmpty())
    <div class="row">
      <div class="col-md-12 text-center">
        <h4>No existen rondas pendientes</h4>
        <h6>Puede crear un nuevo juego en la sección <a href="/view_add_dives">Configurar Rondas y Clavados</a></h6>
      </div>
    </div>
    @endif
  </div>
</div>





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