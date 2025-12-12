@extends('layouts.headeradmin')

@section('title', 'Dashboard')

@section('content')
@if(!empty($RankingReport))
<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      Ranking
    </div>
  </div>

  <div class="row">
    <!-- Competencias -->
    <div class="col-md-12">
      <div class="results-table-container">
        <!-- Versión desktop -->
        <!--<div class="d-none d-md-block">-->
        <div class="d-none d-md-block">
          @include('partials.report_ranking_list', ['event' => 'RankingReport'])
        </div>
      </div>
      <!-- Versión móvil -->
      <div class="d-md-none">
        @include('partials.report_ranking_list', ['event' => 'RankingReport'])
      </div>

    </div>
  </div>

</div>
@endif
@if(empty($RankingReport))
<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      Lista de resultados
    </div>
  </div>
  <div class="row">
    <div class="row">
      <div class="col-md-12 text-center">
        <br>
        <h6>No hay resultados disponibles por el momento.</h6>
      <br>
      </div>
    </div>
  </div>
</div>
@endif





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