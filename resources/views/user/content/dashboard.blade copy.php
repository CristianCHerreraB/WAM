@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="welcome-banner">
  <h1 class="welcome-title">¡Bienvenido de nuevo!</h1>
  <p class="welcome-text">Explora todas las funcionalidades que tenemos para ti.</p>
  <button class="btn btn-light">Comenzar ahora</button>
</div>

<!-- Encabezado de Juego Rápido -->
<div class="row mb-4">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Ingresar juego rápido - Ingresar juego rápido - Ingresar juego rápido</h2>
      <button class="btn btn-outline-secondary btn-sm">
        <i class="fas fa-question-circle"></i> Ayuda
      </button>
    </div>
    <p class="text-muted">Ingresar juego rápido - Ingresar juego rápido - Ingresar juego rápido</p>
  </div>
</div>

<div class="row">
  <!-- Columna izquierda - Competencias -->
  <div class="col-lg-8">
    <!-- Tarjeta de Torneo -->
    <div class="content-card mb-4">
      <div class="card-header bg-success d-flex justify-content-between align-items-center">
        <div>
          <i class="fas fa-trophy me-2"></i> Ir a torneo
        </div>
        <button class="btn btn-sm btn-light">Competir <i class="fas fa-arrow-right ms-1"></i></button>
      </div>
      <div class="card-body">
        <h5 class="card-title border-bottom pb-2">Diving</h5>
        
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
            <div class="card card-body mt-2">
              <small class="text-muted">No hay resultados disponibles todavía.</small>
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
            <div class="card card-body mt-2">
              <small class="text-muted">No hay resultados disponibles todavía.</small>
            </div>
          </div>
        </div>
        
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
            <div class="card card-body mt-2">
              <small class="text-muted">No hay resultados disponibles todavía.</small>
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
            <div class="card card-body mt-2">
              <small class="text-muted">No hay resultados disponibles todavía.</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</div>

<style>
.competition-item {
  padding: 12px 0;
  border-bottom: 1px solid #eee;
}

.competition-item:last-child {
  border-bottom: none;
}

.list-group-item {
  padding: 12px 20px;
  border-color: #eee;
}

.list-group-item .form-check {
  margin-bottom: 0;
}

.list-group-item:hover {
  background-color: #f8f9fa;
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
}

.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
}
</style>
@endsection