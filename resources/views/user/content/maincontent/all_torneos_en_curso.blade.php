@extends('layouts.app')

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
        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving1">
              <label class="form-check-label" for="diving1">Plataforma de 10 metros</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results1">
              <i class="fas fa-chevron-down"></i> Competir
            </button>
          </div>
          <div class="collapse" id="results1">
            <div class="mt-3">
              @include('partials.all_clavadistas', ['event' => 'Votimen tan Springboard'])
            </div>
          </div>
        </div>

        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving2">
              <label class="form-check-label" for="diving2">Plataforma de 7.5 metros</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results2">
              <i class="fas fa-chevron-down"></i> Competir
            </button>
          </div>
          <div class="collapse" id="results2">
            <div class="mt-3">
              @include('partials.all_clavadistas', ['event' => 'Votimen tan Springboard'])
            </div>
          </div>
        </div>

        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving2">
              <label class="form-check-label" for="diving2">Plataforma de 5 metros</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results3">
              <i class="fas fa-chevron-down"></i> Competir
            </button>
          </div>
          <div class="collapse" id="results3">
            <div class="mt-3">
              @include('partials.all_clavadistas', ['event' => 'Votimen tan Springboard'])
            </div>
          </div>
        </div>

        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving2">
              <label class="form-check-label" for="diving2">Plataformas de 1 y 3 metros</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results4">
              <i class="fas fa-chevron-down"></i> Competir
            </button>
          </div>
          <div class="collapse" id="results4">
            <div class="mt-3">
              @include('partials.all_clavadistas', ['event' => 'Votimen tan Springboard'])
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="text-white p-3 shadow position-fixed bottom-0 end-0 m-4 d-flex align-items-center"
  style="cursor: pointer; z-index: 1050;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            padding: 0px !important;
            background: linear-gradient(to right, #030760, #0075b5);">

  <img src="images/ranking.png" height="50" width="75" alt="Ranking" class="me-2">
  <small style="font-size: 4em; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">10</small>

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