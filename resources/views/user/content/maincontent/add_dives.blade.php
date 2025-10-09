  @extends('layouts.app')

  @section('title', 'Dashboard')

  @section('content')
<H4>Agregar rondas y clavados</H4> <br>
  <form action="/action_page.php" class="was-validated">
    @csrf
      <div class="mb-3 mt-3">
          <label for="ronda" class="form-label">Número de Rondas:</label>
          <input type="text" class="form-control" id="ronda" placeholder="Número de rondas" name="ronda" required>
          <div class="invalid-feedback">Por favor ingresa un valor</div>
      </div>
      <div class="mb-3">
          <label for="evento" class="form-label">Nombre del evento:</label>
          <input type="text" class="form-control" id="evento" placeholder="Nombre del evento" name="evento" >
      </div>
      <div class="mb-3">
          <label for="nombre_clavado" class="form-label">Nombre del clavado:</label>
          <input type="text" class="form-control" id="nombre_clavado" placeholder="Nombre del clavado" name="nombre_clavado" required>
          <div class="invalid-feedback">Por favor ingresa un valor</div>
      </div>
      <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción del clavado:</label>
          <input type="text" class="form-control" id="descripcion" placeholder="Descripción del clavado" name="descripcion" >
      </div>
      <div class="mb-3">
          <label for="dificultad" class="form-label">Dificultad:</label>
          <input type="text" class="form-control" id="dificultad" placeholder="Dificultad" name="dificultad" required>
          <div class="invalid-feedback">Por favor ingresa un valor</div>
      </div>

      <div class="mb-3">
          <label for="fecha" class="form-label">Fecha:</label>
          <input type="date" class="form-control" id="fecha" placeholder="Fecha del evento" name="fecha" required>
          <div class="invalid-feedback">Por favor ingresa un valor</div>
      </div>
      <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">¿Es sincronizado?</label>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @endsection