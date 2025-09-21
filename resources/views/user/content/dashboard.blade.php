@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="welcome-banner">
  <h1 class="welcome-title">¡Bienvenido de nuevo!</h1>
  <p class="welcome-text">Explora todas las funcionalidades que tenemos para ti.</p>
  <button class="btn btn-light">Comenzar ahora</button>
</div>

<!-- Encabezado de Juego Rápido -->

<!-- Tarjeta de Torneo - Ocupa todo el ancho -->
<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      <i class="fas fa-trophy me-2"></i> Ir a torneo
    </div>
    <button class="btn btn-light">Competir <i class="fas fa-arrow-right ms-1"></i></button>
  </div>
  <div class="card-body">
    <h5 class="card-title border-bottom pb-2 mb-4">Diving</h5>
    
    <div class="row">
      <!-- Competencias -->
      <div class="col-md-6">
        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving1">
              <label class="form-check-label" for="diving1">Votimen tan Springboard</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results1">
              <i class="fas fa-chevron-down"></i> Ver resultados
            </button>
          </div>
          <div class="collapse" id="results1">
            <div class="mt-3">
              @include('partials.results-table', ['event' => 'Votimen tan Springboard'])
            </div>
          </div>
        </div>
        
        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving2">
              <label class="form-check-label" for="diving2">Votimen tan Springboard</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results2">
              <i class="fas fa-chevron-down"></i> Ver resultados
            </button>
          </div>
          <div class="collapse" id="results2">
            <div class="mt-3">
              @include('partials.results-table', ['event' => 'Votimen tan Springboard 2'])
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving3">
              <label class="form-check-label" for="diving3">Votimen tan FlatTerm</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results3">
              <i class="fas fa-chevron-down"></i> Ver resultados
            </button>
          </div>
          <div class="collapse" id="results3">
            <div class="mt-3">
              @include('partials.results-table', ['event' => 'Votimen tan FlatTerm'])
            </div>
          </div>
        </div>
        
        <div class="competition-item">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="diving4">
              <label class="form-check-label" for="diving4">Votimen tan Synchronized</label>
            </div>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#results4">
              <i class="fas fa-chevron-down"></i> Ver resultados
            </button>
          </div>
          <div class="collapse" id="results4">
            <div class="mt-3">
              @include('partials.results-table', ['event' => 'Votimen tan Synchronized'])
            </div>
          </div>
        </div>
      </div>
    </div>
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