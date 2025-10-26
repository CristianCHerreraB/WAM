@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="content-card mb-4">
  <div class="card-header bg-success d-flex justify-content-between align-items-center">
    <div class="row">
      <div class="col col-md-12 d-flex justify-content-start"><img id="bandera" src="" width="32" height="20" alt="MX">
        <h5 id="hInfo"></h5>
      </div>

      <div class="col col-md-12 card-text placeholder-glow" id="loadnextgame_2">
        <span class="placeholder col-4"></span>
        <span class="placeholder col-4"></span>
        <span class="placeholder col-4"></span>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div id="loadnextgame">
      <div class="row justify-content-center">
        <div class="spinner-border" role="status" style="height: 100px; width: 100px;">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="row justify-content-center">
          <H4 style="text-align: center;" id="textload">El juego está por comenzar, por favor espera.</H4>
        </div>
      </div>
    </div>
    <div id="form_responce">
      <div class="row">
        <!-- Competencias -->
        <div class="col-md-12">
          <form action="/save_check" method="post" id="form-ejecucion">
            @csrf
            <input type="text" name="id_ejecucion" id="id_ejecucion">
            <table class="table">
              <thead>
                <tr>
                  <th colspan="6">
                    Seleccione un puntaje de ejecución
                    <!-- <strong class="float-end">Total seleccionado: <span id="total">0</span></strong>-->
                  </th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <td><input type="radio" name="check" value="1"> 0</td>
                  <td><input type="radio" name="check" value="1.5"> 0.5</td>
                  <td><input type="radio" name="check" value="1"> 1</td>
                  <td><input type="radio" name="check" value="1.5"> 1.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="check" value="2"> 2</td>
                  <td><input type="radio" name="check" value="2.5"> 2.5</td>
                  <td><input type="radio" name="check" value="3"> 3</td>
                  <td><input type="radio" name="check" value="3.5"> 3.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="check" value="4"> 4</td>
                  <td><input type="radio" name="check" value="4.5"> 4.5</td>
                  <td><input type="radio" name="check" value="5"> 5</td>
                  <td><input type="radio" name="check" value="5.5"> 5.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="check" value="6"> 6</td>
                  <td><input type="radio" name="check" value="6.5"> 6.5</td>
                  <td><input type="radio" name="check" value="7"> 7</td>
                  <td><input type="radio" name="check" value="7.5"> 7.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="check" value="8"> 8</td>
                  <td><input type="radio" name="check" value="8.5"> 8.5</td>
                  <td><input type="radio" name="check" value="9"> 9</td>
                  <td><input type="radio" name="check" value="9.5"> 9.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="check" value="10"> 10</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Calificar</button>
            </div>
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
                    <!-- <strong class="float-end">Total seleccionado: <span id="total_sinc">0</span></strong>-->
                  </th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <td><input type="radio" name="sinc" value="1"> 1</td>
                  <td><input type="radio" name="sinc" value="1.5"> 1.5</td>
                  <td><input type="radio" name="sinc" value="2"> 2</td>
                  <td><input type="radio" name="sinc" value="2.5"> 2.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="sinc" value="3"> 3</td>
                  <td><input type="radio" name="sinc" value="3.5"> 3.5</td>
                  <td><input type="radio" name="sinc" value="4"> 4</td>
                  <td><input type="radio" name="sinc" value="4.5"> 4.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="sinc" value="5"> 5</td>
                  <td><input type="radio" name="sinc" value="5.5"> 5.5</td>
                  <td><input type="radio" name="sinc" value="6"> 6</td>
                  <td><input type="radio" name="sinc" value="6.5"> 6.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="sinc" value="7"> 7</td>
                  <td><input type="radio" name="sinc" value="7.5"> 7.5</td>
                  <td><input type="radio" name="sinc" value="8"> 8</td>
                  <td><input type="radio" name="sinc" value="8.5"> 8.5</td>
                </tr>
                <tr>
                  <td><input type="radio" name="sinc" value="9"> 9</td>
                  <td><input type="radio" name="sinc" value="9.5"> 9.5</td>
                  <td><input type="radio" name="sinc" value="10"> 10</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Calificar</button>
            </div>
          </form>
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


<script>
  let id_ejecucion_load = null;
  let intervalo;
  $(document).ready(function() {
    $('#form_responce').hide();
    $('#bandera').hide();
    $('#hInfo').hide();
    $('#id_ejecucion').hide();

    function isStop() {
      $.ajax({
        url: '/dive_in_live',
        method: 'GET',
        success: function(data) {
          console.log('Respuesta:', data.resultado);
          if (data.resultado) {
            const uri = `/flags/4x3/${data.resultado.pais_region}.svg`;
            const h_text = " " +
              (data.resultado.nombre ? data.resultado.nombre : "") + " " +
              (data.resultado.apellido_p ? data.resultado.apellido_p : "") + " " +
              (data.resultado.apellido_m ? data.resultado.apellido_m : "") + " - Ronda #" +
              (data.resultado.num_ejecucion ? data.resultado.num_ejecucion : "") + " " +
              (data.resultado.evento ? data.resultado.evento : "");
            const id_clavado = data.resultado.id_clavado;
            id_ejecucion_load = data.resultado.id_ejecucion;
            $('#id_ejecucion').val(id_ejecucion_load);
            if (data.resultado.stop == 0) {
              $('#bandera').hide();
              $('#hInfo').hide();
              $('#form_responce').hide();
              $('#loadnextgame').show();
              $('#loadnextgame_2').show();
            } else {
              if (data.resultado.sincronizacion == 1) {
                $('#form-sinc').show();
              } else {
                $('#form-sinc').remove();
              }
              $('#bandera').show();
              $('#hInfo').show();
              $('#hInfo').text(h_text);
              $('#id_clavado').val(id_clavado);
              $('#bandera').attr('src', uri);
              $('#form_responce').show();
              $('#loadnextgame').hide();
              $('#loadnextgame_2').hide();
            }
          } else {
            $('#bandera').hide();
            $('#hInfo').hide();
            $('#form_responce').hide();
            $('#loadnextgame').show();
            $('#loadnextgame_2').show();
          }
        },
        error: function() {
          console.error('Error al cargar el contenido.');
        }
      });
    }

    isStop();

    setInterval(isStop, 3000);
  });

  $(document).ready(function() {
    $('#form-ejecucion').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url: '/save_check',
        method: 'POST',
        data: $(this).serialize(),
        success: function(data) {
          console.log('sendForm:', data);
          $('#bandera').hide();
          $('#hInfo').hide();
          $('#form_responce').hide();
          $('#textload').text('Se guardo tu calificación de forma correcta');
          $('#loadnextgame').show();
          $('#loadnextgame_2').show();
          setTimeout(function() {
            location.reload();
          }, 4000);
        },
        error: function(xhr, status, error) {
          console.log('sendForm:', error);
        }
      });
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

  span.placeholder.col-4 {
    width: 90px;
  }
</style>
@endsection