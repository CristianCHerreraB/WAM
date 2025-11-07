  @extends('layouts.app')

  @section('title', 'Dashboard')

  @section('content')
  <div class="content-card mb-4">
      <div class="card-header bg-success d-flex justify-content-between align-items-center">
          <H4>Configurar Rondas y Clavados</H4> <br>
      </div>
      <div class="card-body" style="height:fit-content;">
          <div class="row">
              <form action="/save_dives" class="was-validated">
                  @csrf
                  <div class="row">
                      <div class="col-md-2">
                          <label for="evento" class="form-label">Nombre del evento:</label>
                          <input type="text" class="form-control" id="evento" placeholder="Nombre del evento" name="evento">
                      </div>
                      <div class="col-md-2">
                          <label for="total_rondas" class="form-label">Número de Rondas:</label>
                          <input type="text" class="form-control" id="total_rondas" placeholder="Número de rondas" name="total_rondas" required>
                          <div class="invalid-feedback">Por favor ingresa un valor</div>
                      </div>
                      <div class="col-md-2">
                          <label for="num_participante" class="form-label">Número de participantes:</label>
                          <input type="text" class="form-control" id="num_participante" placeholder="Número de participantes" name="num_participante" required>
                          <div class="invalid-feedback">Por favor ingresa un valor</div>
                      </div>
                      <div class="col-md-2">
                          <br>
                          <label for="fecha" class="form-label">Fecha:</label>
                          <input type="date" class="form-control" id="fecha" placeholder="Fecha del evento" name="fecha" required>
                          <div class="invalid-feedback">Por favor ingresa un valor</div>
                      </div>
                      <div class="col-md-2">
                          <br>
                          <div class="mb-3 form-check" style="padding-top: 18%;">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sincronizacion">
                              <label class="form-check-label" for="exampleCheck1">¿Es sincronizado?</label>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <br><br>
                          <div class="container">
                              <div class="row">
                                  <div class="col align-self-end">
                                      <a href="#" id="creat_table" class="btn btn-primary">Generar</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


                  <div id="createTable">
                      <div class="row justify-content-center">
                          <div class="spinner-border" role="status" style="height: 100px; width: 100px;">
                              <span class="visually-hidden">Loading...</span>
                          </div>
                          <div class="row justify-content-center">
                              <H4 style="text-align: center;">Generar tabla de configuraciones...</H4>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="table-responsive">
                          <table class="table align-middle">
                              <thead>
                                  <tr id="columnas">

                                  </tr>
                              </thead>
                              <tbody id="filas">

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="container text-end">
                      <div class="row">
                          <div class="col align-self-end">
                              <button id="btn_guardar" type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
          <div class="d-md-none">
            <!--VISTA MOVIL-->
          </div>
      </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $('#createTable').hide();
      $('#btn_guardar').hide();
      $(document).ready(function() {
          $('#creat_table').on('click', function() {
              $('#createTable').show();
              let limt_col = parseInt($('#total_rondas').val());
              let limit_fil = parseInt($('#num_participante').val());
              $('#columnas').html('');
              $('#filas').html('');
              if (isNaN(limt_col) || limt_col < 1) {
                  setTimeout(function() {
                      $('#columnas').html('');
                      $('#filas').html('');
                      $('#createTable').hide();
                  }, 2000);
                  return;
              }


              let columna = '';
              let filas = '';
              let filasmovil = '';

              columna += '<th scope="col">Orden</th>';
              columna += '<th scope="col">Nombre</th>';
              columna += '<th scope="col">País</th>';

              for (let a = 1; a <= limt_col; a++) {
                  columna += '<th scope="col">Dive ' + a + '</th>';
                  columna += '<th scope="col">DD ' + a + '</th>';
              }

              for (let b = 1; b <= limit_fil; b++) {
                  let fila = '<tr>';

                  fila += '<td><input type="number"  min="1" class="form-control"  name="orden[' + b + ']" required> </td>';
                  fila += '<td><input type="text" class="form-control" name="nombre[' + b + ']" required></td>';
                  fila += '<td><input type="text" class="form-control" name="pais_region[' + b + ']" required></td>';

                  for (let i = 1; i <= limt_col; i++) {
                      fila += '<td><input type="text" class="form-control" id="dive' + b + '_' + i + '" name="dive[' + b + '][' + i + ']" required></td>';
                      fila += '<td><input type="text" class="form-control" id="dificultad' + b + '_' + i + '" name="dificultad[' + b + '][' + i + ']" required></td>';
                  }

                  fila += '</tr>';
                  filas += fila;
              }

              setTimeout(function() {
                  $('#createTable').hide();
                  $('#columnas').html(columna);
                  $('#filas').html(filas);
                  $('#btn_guardar').show();
              }, 2000);
          });
      });
  </script>

  @endsection