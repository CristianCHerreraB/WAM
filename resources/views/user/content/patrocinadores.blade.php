@extends('layouts.app')

@section('title', 'Nombre de la Página')

@section('content')
<div id="page-title" style="display: none;">patrocinadores</div>

<div class="container-fluid">
    <h2 class="mb-4">TUTORIAL</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar en mi biblioteca...">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group">
                <button class="btn btn-outline-primary active">Todos</button>
                <button class="btn btn-outline-primary">Cursos</button>
                <button class="btn btn-outline-primary">Juegos</button>
                <button class="btn btn-outline-primary">Evaluaciones</button>
            </div>
        </div>
    </div>

    <div class="content-grid">
        <div class="content-card">
            <div class="card-header">
                <i class="fas fa-book me-2"></i>Curso
            </div>
            <div class="card-body">
                <h5 class="card-title">Natación para principiantes</h5>
                <p class="card-text">Aprende los fundamentos de la natación desde cero.</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Actualizado hace 2 días</small>
                    <a href="#" class="btn btn-outline-primary btn-sm">Abrir</a>
                </div>
            </div>
        </div>
        
        <div class="content-card">
            <div class="card-header">
                <i class="fas fa-gamepad me-2"></i>Juego
            </div>
            <div class="card-body">
                <h5 class="card-title">Quiz de estilos de natación</h5>
                <p class="card-text">Pon a prueba tus conocimientos sobre los diferentes estilos.</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Creado hace 1 semana</small>
                    <a href="#" class="btn btn-outline-primary btn-sm">Jugar</a>
                </div>
            </div>
        </div>
        
        <div class="content-card">
            <div class="card-header">
                <i class="fas fa-clipboard-list me-2"></i>Evaluación
            </div>
            <div class="card-body">
                <h5 class="card-title">Examen de técnicas avanzadas</h5>
                <p class="card-text">Evalúa tu dominio de las técnicas más complejas de natación.</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Realizado hace 3 días</small>
                    <a href="#" class="btn btn-outline-primary btn-sm">Ver resultados</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
