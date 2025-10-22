<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORLD AQUATICS - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* -------- Estilos Globales -------- */
        :root {
            --primary-color: #5bc0de;
            --secondary-color: #007bff;
            --accent-color: #17a2b8;
            --text-color: #333;
            --light-bg: #f0f8ff;
            --white: #ffffff;
            --dark-blue: #0056b3;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* -------- Carrusel de Anuncios -------- */
        .carousel-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .carousel-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            padding: 10px;
        }

        /* -------- Contenido Principal -------- */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            width: 100%;
            gap: 60px;
        }

        /* -------- Logo -------- */
        .logo-section {
            flex: 1;
            text-align: center;
        }

        .logo-img {
            max-width: 70%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .logo-title {
            color: var(--secondary-color);
            font-size: 2.5rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .logo-subtitle {
            color: var(--text-color);
            font-size: 1.2rem;
            line-height: 1.5;
            margin-top: 10px;
        }

        /* -------- Formulario de Login -------- */
        .login-section {
            flex: 1;
            max-width: 450px;
        }

        .login-box {
            background: var(--white);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-top: 5px solid var(--primary-color);
        }

        .login-title {
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* -------- Inputs -------- */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group-text {
            background-color: var(--light-bg);
            border: 1px solid #ced4da;
            border-right: none;
        }

        .form-control {
            border-left: none;
            padding-left: 0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }

        /* -------- Botones -------- */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-primary-custom:hover {
            background-color: var(--accent-color);
            box-shadow: 0 4px 12px rgba(91, 192, 222, 0.4);
        }

        .btn-secondary-custom {
            background-color: var(--white);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-secondary-custom:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }

        /* -------- Enlaces -------- */
        .forgot-password {
            text-align: center;
            margin: 15px 0;
        }

        .forgot-password a {
            color: var(--dark-blue);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        /* -------- Divisor -------- */
        .divider {
            height: 1px;
            background: #ddd;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: "o";
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--white);
            padding: 0 10px;
            color: #777;
        }

        /* -------- Modal -------- */
        .modal-header {
            background-color: var(--light-bg);
            border-bottom: 2px solid var(--primary-color);
        }

        .modal-title {
            color: var(--secondary-color);
            font-weight: 600;
        }

        /* -------- Footer -------- */
        .footer {
            background-color: #000;
            color: #fff;
            padding: 30px 0;
            margin-top: auto;
        }

        .footer h5 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer p {
            margin: 0 0 10px;
            line-height: 1.6;
        }

        .footer-logo-img {
            max-width: 120px;
            height: auto;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
            font-size: 14px;
        }

        .footer a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        .copyright {
            margin-top: 10px;
            font-size: 13px;
            color: #bbb;
        }

        /*------*/
        .btn-natacion-primario {
            background-color: #00bcd4;
            color: white;
            border: none;
            border-radius: 12px;
            /* Bordes redondeados */
            padding: 0.6rem 1rem;
            /* Tamaño cómodo */
            font-size: 1rem;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            width: 100%;
            /* Ancho completo */
            box-sizing: border-box;
            /* Para que padding no aumente ancho */
            height: 45px;
            /* Altura fija para uniformidad */
        }

        /* -------- Mensajes de error -------- */
        .input-error {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* -------- Recordarme -------- */
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input {
            margin-right: 8px;
        }

        /* -------- Responsive -------- */
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
                gap: 40px;
            }

            .logo-section {
                order: 1;
            }

            .login-section {
                order: 2;
                max-width: 100%;
            }

            .logo-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .login-box {
                padding: 30px 20px;
            }

            .carousel-container {
                height: 150px;
            }

            .carousel-img {
                height: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- Carrusel de Anuncios -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Imagen 1: Entrenamiento de natación -->
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 carousel-img" alt="Entrenamiento de natación">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Mejora tu técnica</h5>
                    <p>Programas de entrenamiento personalizados para todos los niveles</p>
                </div>
            </div>

            <!-- Imagen 2: Competición -->
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 carousel-img" alt="Competición de natación">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Próximos eventos</h5>
                    <p>Participa en nuestras competiciones internacionales</p>
                </div>
            </div>

            <!-- Imagen 3: Equipamiento -->
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 carousel-img" alt="Equipamiento de natación">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tienda oficial</h5>
                    <p>Encuentra el mejor equipamiento para tu práctica</p>
                </div>
            </div>
        </div>

        <!-- Controles del carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Contenido Principal -->
    <div class="main-content">
        <div class="content-wrapper">
            <!-- Logo y descripción -->
            <div class="logo-section">
                <!-- Logo de la plataforma -->
                <div class="mb-4">
                    <img src="{{ asset('images/LogoWorldAquatics.jpeg') }}" alt="Logo World Aquatics" class="logo-img">
                </div>
            </div>

            <!-- Formulario de Login -->
            <div class="login-section">
                <div class="login-box">
                    <h2 class="login-title">Iniciar Sesión</h2>

                    <!-- Formulario de Laravel Breeze adaptado -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Correo Electrónico -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control" name="correo" :value="old('correo')" required autofocus autocomplete="email" placeholder="Correo electrónico">
                        </div>
                        @if ($errors->has('correo'))
                        <div class="input-error">
                            {{ $errors->first('correo') }}
                        </div>
                        @endif

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Contraseña">
                        </div>
                        @if ($errors->has('password'))
                        <div class="input-error">
                            {{ $errors->first('password') }}
                        </div>
                        @endif

                        <!-- Remember Me -->
                        <div class="remember-me">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <label for="remember_me" class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</label>
                        </div>

                        <!-- Botón de inicio de sesión -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn-natacion-primario">
                                {{ __('Ingresar') }}
                            </button>
                        </div>

                        <!-- Enlace "Olvidaste tu contraseña" -->
                        <div class="forgot-password">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">¿Olvidaste tu contraseña?</a>

                            <!--@if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </!--a>
                            @endif-->
                        </div>

                        <!-- Divisor -->
                        <div class="divider"></div>

                        <!-- Botón de registro -->
                        <a href="{{ route('signIn') }}" class="btn btn-secondary-custom" id="createAccount">Crear una cuenta</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para recuperar contraseña -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPasswordModalLabel">Recuperar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de Laravel Breeze para recuperación de contraseña -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="ejemplo@correo.com">

                            <!-- Mostrar errores de validación -->
                            @if ($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100">Enviar enlace de recuperación</button>
                    </form>
                </div>
                <!-- Contenedor de información -->
                <div class="modal-footer justify-content-center">
                    <div class="alert alert-info w-100 text-center mb-0" role="alert">
                        <i class="fas fa-info-circle"></i> Ingresa tu correo y revisa tu bandeja de entrada para el enlace de recuperación.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <!-- Columna izquierda: Información de contacto -->
                <div class="col-md-6">
                    <h5>Mexico</h5>
                    <p>
                        Olimpo de deportistas<br>
                        Olimpo de deportistas<br>
                        Olimpo de deportistas
                    </p>
                    <p>
                        Tel: +52 21 310 47 10<br>
                        Fax: +52 21 312 66 10<br>
                        Linea de soporte: +52 21 310 47 10<br>
                        Correo de soporte: +52 21 310 47 10 <br>
                    </p>
                </div>

                <!-- Columna derecha: Logo y derechos de autor -->
                <div class="col-md-6 text-md-end text-center">
                    <div class="footer-logo mb-3">
                        <img src="{{ asset('images/LogoWorldAquatics.jpeg') }}" alt="Logo World Aquatics" class="footer-logo-img">
                    </div>
                    <div class="copyright">
                        Copyright 2018 - 2025 World Aquatics. All rights reserved.
                        <a href="#">Legal</a> | <a href="#">Privacy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>