@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      <i class="fas fa-trophy me-2"></i>Mis Aciertos
    </div>
  </div>
  <div class="card-body">
    <div class="row">

      <!-- Competencias -->
      <div class="col-md-12">
        @if(!empty($clavados))
        @foreach ($clavados as $item)
        <ul class="list-group list-group-flush">
          <a href="/athlete_list/{{$item->id_clavado}}" class="link_list">
            <li class="list-group-item list">
              <div class="d-flex flex-column flex-md-row w-100">
                <span class="me-2">
                  <strong>Evento:</strong> {{$item->evento}}
                </span>
                <span>
                  <strong>Total de Rondas:</strong> {{$item->total_rondas}}
                </span>
              </div>
            </li>
          </a>
        </ul>
        @endforeach
        @endif
      </div>
    </div>
    @if($clavados->isEmpty())
    <div class="row">
      <div class="col-md-12 text-center">
        <h6>No hay resultados disponibles por el momento.</h6>
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
<style>
  .list {
    display: block;
    /* Hace que el enlace ocupe toda el área del <li> */
    color: inherit;
    /* Mantiene el color del texto del tema */
    text-decoration: none;
    /* Quita el subrayado */
    width: 100%;
    height: 100%;
  }

  .link_list {
    text-decoration: none;
    color: #2e7ac7ff;
  }

  .list:hover {
    background-color: #f0f0f0;
    /* Efecto visual al pasar el mouse */
  }
</style>
@endsection