<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="boton.css">
    @vite(['resources/css/boton.css', 'resources/css/modal.css', 'resources/css/general.css'])
</head>

<body>

    <div class="container py-5">
        <div class="card p-4 shadow-lg mx-auto" style="max-width: 500px;">
            <h4 class="text-center mb-4 fw-bold text-primary" data-i18n="register.title">Registro de Usuario</h4>

            <form>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.username">Usuario</label>
                    <input type="text" class="form-control" placeholder="Usuario">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.password">Contraseña</label>
                    <input type="password" class="form-control" placeholder="********">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.email">Correo</label>
                    <input type="email" class="form-control" placeholder="ejemplo@correo.com">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.name">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.lastname1">Primer Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido 1">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.lastname2">Segundo Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido 2">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.country">País</label>
                    <input type="text" class="form-control" placeholder="País">
                </div>
                <div class="mb-3">
                    <label class="form-label" data-i18n="register.phone">Número Telefónico</label>
                    <input type="tel" class="form-control" placeholder="+57 300 000 0000">
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <!-- Botón Registrar -->
                    <button type="submit" class="btn-natacion-primario">Registrar</button>

                    <!-- Botón Devolver -->
                    <a href="{{ route('login') }}"  type="button" class="btn-natacion-secundario" onclick="window.history.back();">
                        Devolver
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>