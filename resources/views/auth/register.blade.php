<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro - World Aquatics</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #1f2123ff;
            --secondary-color: #007bff;
            --accent-color: #17a2b8;
            --text-color: #2997b2ff;
            --light-bg: #f0f8ff;
            --white: #ffffff;
            --dark-blue: #0056b3;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #F0F8FF;
            color: #000;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .registration-card {
            background-color: var(--white);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            animation: cardSlideIn 0.6s ease-out;
        }

        @keyframes cardSlideIn {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .card-header {
            background: linear-gradient(to right, #5bc0de, #17a2b8);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .card-header h2 {
            margin: 0;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            background-color: var(--light-bg);
            border: 1px solid #ced4da;
            border-right: none;
            transition: all 0.3s;
        }

        .form-control {
            border-left: none;
            padding-left: 0;
            transition: all 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(91, 192, 222, 0.25);
            border-color: var(--primary-color);
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            z-index: 5;
        }

        .password-strength {
            height: 5px;
            margin-top: 8px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .password-strength.weak {
            background-color: var(--error-color);
            width: 30%;
        }

        .password-strength.medium {
            background-color: var(--warning-color);
            width: 60%;
        }

        .password-strength.strong {
            background-color: var(--success-color);
            width: 100%;
        }

        .btn-register {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            color: white;
            margin-top: 10px;
        }

        .btn-register:hover:not(:disabled) {
            background-color: var(--accent-color);
            box-shadow: 0 4px 12px rgba(91, 192, 222, 0.4);
            transform: translateY(-2px);
        }

        .btn-back {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            color: var(--primary-color);
            margin-top: 15px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-back:hover {
            background-color: var(--light-bg);
            transform: translateY(-2px);
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: rgba(0, 0, 0, 0.6);
            font-size: 0.9rem;
        }

        .footer a {
            color: rgba(0, 0, 0, 0.7);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .registration-card {
                max-width: 100%;
            }

            .card-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="registration-card">
        <div class="card-header">
            <h2><i class="fas fa-user-plus me-2"></i>Crear Cuenta</h2>
            <p class="mb-0">Únete a la comunidad de World Aquatics</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" id="registrationForm">
                @csrf

                                <!-- Correo Electrónico -->
                <div class="form-group">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control @error('correo') is-invalid @enderror"
                            id="correo" name="correo" value="{{ old('correo') }}"
                            placeholder="ejemplo@correo.com" required>
                    </div>
                    @error('correo')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group password-container">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password"
                            placeholder="Crea una contraseña segura" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="passwordStrength"></div>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control"
                            id="password_confirmation" name="password_confirmation"
                            placeholder="Confirma tu contraseña" required>
                    </div>
                </div>

                <!-- Nombre -->
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre" name="nombre" value="{{ old('nombre') }}"
                            placeholder="Tu nombre" required>
                    </div>
                    @error('nombre')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Primer Apellido -->
                <div class="form-group">
                    <label for="apellido_p" class="form-label">Primer Apellido</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control @error('apellido_p') is-invalid @enderror"
                            id="apellido_p" name="apellido_p" value="{{ old('apellido_p') }}"
                            placeholder="Primer apellido" required>
                    </div>
                    @error('apellido_p')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                

                <!-- Segundo Apellido -->
                <div class="form-group">
                    <label for="apellido_m" class="form-label">Segundo Apellido <small></small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control @error('apellido_m') is-invalid @enderror"
                            id="apellido_m" name="apellido_m" value="{{ old('apellido_m') }}"
                            placeholder="Segundo apellido">
                    </div>
                    @error('apellido_m')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Género -->
                <div class="form-group">
                    <label for="genero" class="form-label">Género <small></small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        <select class="form-control @error('genero') is-invalid @enderror"
                            id="genero" name="genero">
                            <option value="">Selecciona tu género</option>
                            <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>
                    @error('genero')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Número de Celular -->
                <div class="form-group">
                    <label for="telefono" class="form-label">Número de Celular <small>(Requerido)</small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror"
                            id="telefono" name="telefono" value="{{ old('telefono') }}"
                            placeholder="Número de telefono">
                    </div>
                    @error('telefono')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Instagram -->
                <div class="form-group">
                    <label for="user_instagram" class="form-label">Usuario Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="text" class="form-control @error('user_instagram') is-invalid @enderror"
                            id="user_instagram" name="user_instagram" value="{{ old('user_instagram') }}"
                            placeholder="Enlace a tu perfil de user_instagram">
                    </div>
                    @error('user_instagram')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <!-- user_facebook -->
                <div class="form-group">
                    <label for="user_facebook" class="form-label">Usuario Facebook <small></small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                        <input type="text" class="form-control @error('user_facebook') is-invalid @enderror"
                            id="user_facebook" name="user_facebook" value="{{ old('user_facebook') }}"
                            placeholder="Enlace a tu perfil de user_facebook">
                    </div>
                    @error('user_facebook')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <!-- X -->
                <div class="form-group">
                    <label for="user_x" class="form-label">Usuario X <small></small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-x"></i></span>
                        <input type="text" class="form-control @error('user_x') is-invalid @enderror"
                            id="user_x" name="user_x" value="{{ old('user_x') }}"
                            placeholder="Enlace a tu perfil de x">
                    </div>
                    @error('user_x')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Edad -->
                <div class="form-group">
                    <label for="edad" class="form-label">Edad <small></small></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                        <input type="number" class="form-control @error('edad') is-invalid @enderror"
                            id="edad" name="edad" value="{{ old('edad') }}"
                            placeholder="Tu edad">
                    </div>
                    @error('edad')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>



                <!-- Botones de acción -->
                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-plus me-2"></i>Registrar
                </button>

                <a href="{{ route('login') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left me-2"></i>Volver al Login
                </a>
            </form>
        </div>
    </div>

    <footer class="footer">
        <p>Copyright 2018 - 2025 World Aquatics. Todos los derechos reservados.
            <a href="#">Legal</a> | <a href="#">Privacidad</a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const passwordStrength = document.getElementById('passwordStrength');

            // Mostrar/ocultar contraseña
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });

            // Evaluar fortaleza de contraseña
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                passwordStrength.className = 'password-strength';
                if (password.length === 0) {
                    return;
                } else if (strength <= 2) {
                    passwordStrength.classList.add('weak');
                } else if (strength === 3) {
                    passwordStrength.classList.add('medium');
                } else {
                    passwordStrength.classList.add('strong');
                }
            });
        });
    </script>
</body>

</html>