@extends('layouts.app')

@section('title', 'Tutorial')

@section('content')
<div id="page-title" style="display: none;">TUTORIAL</div>

<div class="container-fluid">
    <h2 class="mb-4">TUTORIAL DEL JUEGO</h2>

    <!-- Sección de Video Tutorial -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-play-circle me-2"></i>Video Tutorial
                    </h5>
                </div>
                <div class="card-body p-0">
                    <!-- Contenedor responsivo para el video -->
                    <div class="ratio ratio-16x9">
                        <iframe 
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                            title="Video Tutorial" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Tutorial de Natación - Técnicas Básicas</h6>
                        <small class="text-muted">Duración: 15:30 min</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    /* Estilos adicionales para mejorar la responsividad */
    .content-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .content-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .card-header {
        background-color: #f8f9fa;
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #e0e0e0;
        font-weight: 600;
    }
    
    .card-body {
        padding: 1rem;
    }
    
    /* Ajustes responsivos para el video */
    @media (max-width: 768px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
        
        .btn-group {
            width: 100%;
            margin-top: 1rem;
        }
        
        .btn-group .btn {
            flex: 1;
        }
    }
</style>
@endsection