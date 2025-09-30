@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">

<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div>
      <img src="https://flagcdn.com/w40/us.png" alt="USA"> USA - Michael Johnson - Ronda #1
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <!-- Competencias -->
      <div class="col-md-12">
        <form action="/submit" method="post" id="form-ejecucion">
          <table class="table">
            <thead>
              <tr>
                <th colspan="6">
                  Seleccione un puntaje de ejecución
                  <strong class="float-end">Total seleccionado: <span id="total">0</span></strong>
                </th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <td><input type="radio" name="ejecucion_1" value="1"> 1</td>
                <td><input type="radio" name="ejecucion_2" value="1.5"> 1.5</td>
                <td><input type="radio" name="ejecucion_3" value="2"> 2</td>
                <td><input type="radio" name="ejecucion_4" value="2.5"> 2.5</td>
                <td><input type="radio" name="ejecucion_5" value="3"> 3</td>
                <td><input type="radio" name="ejecucion_6" value="3.5"> 3.5</td>
              </tr>
              <tr>
                <td><input type="radio" name="ejecucion_7" value="4"> 4</td>
                <td><input type="radio" name="ejecucion_8" value="4.5"> 4.5</td>
                <td><input type="radio" name="ejecucion_9" value="5"> 5</td>
                <td><input type="radio" name="ejecucion_10" value="5.5"> 5.5</td>
                <td><input type="radio" name="ejecucion_11" value="6"> 6</td>
                <td><input type="radio" name="ejecucion_12" value="6.5"> 6.5</td>
              </tr>
              <tr>
                <td><input type="radio" name="ejecucion_13" value="7"> 7</td>
                <td><input type="radio" name="ejecucion_14" value="7.5"> 7.5</td>
                <td><input type="radio" name="ejecucion_15" value="8"> 8</td>
                <td><input type="radio" name="ejecucion_16" value="8.5"> 8.5</td>
                <td><input type="radio" name="ejecucion_17" value="9"> 9</td>
                <td><input type="radio" name="ejecucion_18" value="9.5"> 9.5</td>
              </tr>
              <tr>
                <td><input type="radio" name="ejecucion_19" value="10"> 10</td>
              </tr>
            </tbody>
          </table>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
    <br>
    <div class="row">
      <!-- Competencias -->
      <div class="col-md-12">
        <form action="/submit" method="post" id="form-sinc">
          <table class="table">
            <thead>
              <tr>
                <th colspan="6">
                  Seleccione un puntaje de sincronización
                  <strong class="float-end">Total seleccionado: <span id="total_sinc">0</span></strong>
                </th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <td><input type="radio" name="sinc_1" value="1"> 1</td>
                <td><input type="radio" name="sinc_2" value="1.5"> 1.5</td>
                <td><input type="radio" name="sinc_3" value="2"> 2</td>
                <td><input type="radio" name="sinc_4" value="2.5"> 2.5</td>
                <td><input type="radio" name="sinc_5" value="3"> 3</td>
                <td><input type="radio" name="sinc_6" value="3.5"> 3.5</td>
              </tr>
              <tr>
                <td><input type="radio" name="sinc_7" value="4"> 4</td>
                <td><input type="radio" name="sinc_8" value="4.5"> 4.5</td>
                <td><input type="radio" name="sinc_9" value="5"> 5</td>
                <td><input type="radio" name="sinc_10" value="5.5"> 5.5</td>
                <td><input type="radio" name="sinc_11" value="6"> 6</td>
                <td><input type="radio" name="sinc_12" value="6.5"> 6.5</td>
              </tr>
              <tr>
                <td><input type="radio" name="sinc_13" value="7"> 7</td>
                <td><input type="radio" name="sinc_14" value="7.5"> 7.5</td>
                <td><input type="radio" name="sinc_15" value="8"> 8</td>
                <td><input type="radio" name="sinc_16" value="8.5"> 8.5</td>
                <td><input type="radio" name="sinc_17" value="9"> 9</td>
                <td><input type="radio" name="sinc_18" value="9.5"> 9.5</td>
              </tr>
              <tr>
                <td><input type="radio" name="sinc_19" value="10"> 10</td>
              </tr>
            </tbody>
          </table>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  const form = document.getElementById('form-ejecucion');
  const totalDisplay = document.getElementById('total');
  const form_sinc = document.getElementById('form-sinc');
  const totalDisplay_sinc = document.getElementById('total_sinc');

  form.addEventListener('change', () => {
    let total = 0;
    const groups = [
      'ejecucion_1', 'ejecucion_2', 'ejecucion_3', 'ejecucion_4', 'ejecucion_5', 'ejecucion_6', 'ejecucion_7', 'ejecucion_8', 'ejecucion_9', 'ejecucion_10', 'ejecucion_11', 'ejecucion_12', 'ejecucion_13', 'ejecucion_14', 'ejecucion_15', 'ejecucion_16', 'ejecucion_17', 'ejecucion_18', 'ejecucion_19'
    ];

    groups.forEach(name => {
      const selected = form.querySelector(`input[name="${name}"]:checked`);
      if (selected) {
        total += parseFloat(selected.value);
      }
    });

    totalDisplay.textContent = total.toFixed(1);
  });


   form_sinc.addEventListener('change', () => {
    let total_sinc = 0;
    const groups = [
      'sinc_1', 'sinc_2', 'sinc_3', 'sinc_4', 'sinc_5', 
      'sinc_6', 'sinc_7', 'sinc_8', 'sinc_9', 'sinc_10', 
      'sinc_11', 'sinc_12', 'sinc_13', 'sinc_14', 'sinc_15',
      'sinc_16', 'sinc_17', 'sinc_18', 'sinc_19'
    ];

    groups.forEach(name => {
      const selected = form_sinc.querySelector(`input[name="${name}"]:checked`);
      if (selected) {
        total_sinc += parseFloat(selected.value);
      }
    });

    totalDisplay_sinc.textContent = total_sinc.toFixed(1);
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