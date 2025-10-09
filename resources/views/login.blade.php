<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Plataforma Deportiva</title>
    <!-- Bootstrap 5.3.8 -->
    @vite(['resources/css/boton.css', 'resources/css/modal.css', 'resources/css/general.css'])


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">

            <!-- Columna izquierda con logo + texto -->
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <div class="text-center mb-3">
                    <img src="{{ asset('images/LogoWorldAquatics.jpeg') }}" alt="Logo" class="img-fluid" style="max-width: 180px; height: auto;" />
                </div>
                <h4 class="fw-bold text-primary">Plataforma - Plataforma - Plataforma</h4>
                <p class="text-muted">Comentario - Comentario - Comentario - Comentario</p>
            </div>

            <!-- Columna derecha con formulario -->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card shadow-sm p-4 w-100" style="max-width: 400px;">
                    <form action="inicio.html" method="get">
                        <div class="mb-3">
                            <input type="email" class="form-control"
                                placeholder="Correo electrónico o número de teléfono" required />
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña" required />
                        </div>

                        <!-- Botón de login -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn-natacion-primario btn-natacion-w-100">Iniciar
                                sesión</button>
                        </div>

                        <!-- Link para recuperar contraseña -->
                        <div class="text-center mb-3">
                            <a href="#" class="small" data-bs-toggle="modal" data-bs-target="#modalRecuperar">¿Olvidaste
                                tu contraseña?</a>
                        </div>

                        <hr />

                        <!-- Botón de registro abre modal -->
                        <div class="d-grid">
                            <a href="{{ route('signIn') }}" class="btn-natacion-secundario">Crear una cuenta</a>                  

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Bienvenida -->
    <div class="modal fade" id="modalBienvenida" tabindex="-1" aria-labelledby="modalBienvenidaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow-lg">
                <!-- Encabezado -->
                <div class="modal-header custom-header text-white">
                    <h5 class="modal-title" id="modalBienvenidaLabel">¡Bienvenido!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <!-- Cuerpo -->
                <div class="modal-body">
                    <p>
                        Bienvenido
                    </p>
                </div>
                <!-- Footer -->
                <div class="modal-footer custom-footer">
                    <button type="button" class="btn btn-custom-primary" data-bs-dismiss="modal">Continuar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Recuperar Contraseña -->
    <div class="modal fade" id="modalRecuperar" tabindex="-1" aria-labelledby="modalRecuperarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRecuperarLabel">Recuperar Contraseña</h5>
                    <button type="submit" class="btn-natacion-primario btn-natacion-w-100">Registrarse</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recoverEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="recoverEmail" placeholder="ejemplo@correo.com"
                                required />
                        </div>
                        <button type="submit" class="btn-natacion-secundario btn-natacion-w-100">Enviar enlace</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Registro -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistroLabel">Crear una cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="regEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="regEmail" placeholder="ejemplo@correo.com"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="regPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="regPassword" placeholder="********"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="regConfirmPassword" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="regConfirmPassword" placeholder="********"
                                required />
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mostrar modal bienvenida automáticamente al cargar la página
        window.onload = () => {
            const bienvenidaModal = new bootstrap.Modal(document.getElementById("modalBienvenida"));
            bienvenidaModal.show();
        };
    </script>
</body>

</html>