<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background: #F0F8FF;/* linear-gradient(135deg, #5bc0de, #0b515bff);*/
            color: 0000;/*var(--text-color);*/
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
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
        
        .form-control:focus + .input-group-text {
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
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .btn-register:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
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
        }
        
        .btn-back:hover {
            background-color: var(--light-bg);
            transform: translateY(-2px);
        }
        
        .btn-back:active {
            transform: translateY(0);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 5px;
            display: none;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }
        
        .footer a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .registration-card {
                max-width: 100%;
            }
            
            .card-body {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 10px;
            }
            
            .card-header {
                padding: 20px;
            }
            
            .card-body {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Card de Registro -->
    <div class="registration-card">
        <!-- Cabecera con gradiente -->
        <div class="card-header">
            <h2><i class="fas fa-user-plus me-2"></i>Crear Cuenta</h2>
            <p class="mb-0">Únete a la comunidad de World Aquatics</p>
        </div>
        
        <!-- Cuerpo del formulario -->
        <div class="card-body">
            <form id="registrationForm">
                <!-- Campo de Usuario -->
                <div class="form-group">
                    <label for="username" class="form-label">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" placeholder="Ingresa tu nombre de usuario" required>
                    </div>
                    <div class="error-message" id="usernameError">El usuario debe tener al menos 3 caracteres</div>
                </div>
                
                <!-- Campo de Correo Electrónico -->
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="error-message" id="emailError">Ingresa un correo electrónico válido</div>
                </div>
                
                <!-- Campo de Contraseña -->
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group password-container">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Crea una contraseña segura" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="passwordStrength"></div>
                    <div class="error-message" id="passwordError">La contraseña debe tener al menos 8 caracteres</div>
                </div>
                
                <!-- Campo de Nombre -->
                <div class="form-group">
                    <label for="firstName" class="form-label">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control" id="firstName" placeholder="Tu nombre" required>
                    </div>
                    <div class="error-message" id="firstNameError">Este campo es obligatorio</div>
                </div>
                
                <!-- Campo de Primer Apellido -->
                <div class="form-group">
                    <label for="firstLastName" class="form-label">Primer Apellido</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control" id="firstLastName" placeholder="Primer apellido" required>
                    </div>
                    <div class="error-message" id="firstLastNameError">Este campo es obligatorio</div>
                </div>
                
                <!-- Campo de Segundo Apellido -->
                <div class="form-group">
                    <label for="secondLastName" class="form-label">Segundo Apellido</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control" id="secondLastName" placeholder="Segundo apellido">
                    </div>
                </div>
                
                <!-- Campo de País -->
                <div class="form-group">
                    <label for="country" class="form-label">País</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                        <input type="text" class="form-control" id="country" placeholder="Tu país" required>
                    </div>
                    <div class="error-message" id="countryError">Este campo es obligatorio</div>
                </div>
                
                <!-- Campo de Número Telefónico -->
                <div class="form-group">
                    <label for="phone" class="form-label">Número Telefónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <span class="input-group-text">+57</span>
                        <input type="tel" class="form-control" id="phone" placeholder="3001234567" pattern="[0-9]{10}" required>
                    </div>
                    <div class="error-message" id="phoneError">Ingresa un número válido de 10 dígitos</div>
                </div>
                
                <!-- Botones de acción -->
                <button type="submit" class="btn btn-register" id="registerButton" disabled>
                    <i class="fas fa-user-plus me-2"></i>Registrar
                </button>
                
                <a type="button" class="btn btn-back" href="{{ route('login') }}" >
                    <i class="fas fa-arrow-left me-2"></i>Devolver
                </a>
            </form>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <p>Copyright 2018 - 2025 World Aquatics. Todos los derechos reservados. 
           <a href="#">Legal</a> | <a href="#">Privacidad</a>
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script personalizado -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del DOM
            const registrationForm = document.getElementById('registrationForm');
            const registerButton = document.getElementById('registerButton');
            const backButton = document.getElementById('backButton');
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const passwordStrength = document.getElementById('passwordStrength');
            
            // Campos del formulario
            const formFields = [
                'username', 'email', 'password', 'firstName', 
                'firstLastName', 'country', 'phone'
            ];
            
            // Estado de validación de campos
            const fieldValidity = {};
            formFields.forEach(field => {
                fieldValidity[field] = false;
            });
            
            // Función para mostrar/ocultar contraseña
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
            
            // Función para evaluar la fortaleza de la contraseña
            function checkPasswordStrength(password) {
                let strength = 0;
                
                // Longitud mínima
                if (password.length >= 8) strength++;
                
                // Contiene letras minúsculas y mayúsculas
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
                
                // Contiene números
                if (/[0-9]/.test(password)) strength++;
                
                // Contiene caracteres especiales
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                
                // Actualizar barra de fortaleza
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
            }
            
            // Función para validar un campo específico
            function validateField(fieldId, value) {
                const errorElement = document.getElementById(fieldId + 'Error');
                
                switch(fieldId) {
                    case 'username':
                        const isValidUsername = value.length >= 3;
                        fieldValidity.username = isValidUsername;
                        errorElement.style.display = isValidUsername ? 'none' : 'block';
                        return isValidUsername;
                        
                    case 'email':
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        const isValidEmail = emailRegex.test(value);
                        fieldValidity.email = isValidEmail;
                        errorElement.style.display = isValidEmail ? 'none' : 'block';
                        return isValidEmail;
                        
                    case 'password':
                        const isValidPassword = value.length >= 8;
                        fieldValidity.password = isValidPassword;
                        errorElement.style.display = isValidPassword ? 'none' : 'block';
                        checkPasswordStrength(value);
                        return isValidPassword;
                        
                    case 'firstName':
                    case 'firstLastName':
                    case 'country':
                        const isValid = value.trim().length > 0;
                        fieldValidity[fieldId] = isValid;
                        errorElement.style.display = isValid ? 'none' : 'block';
                        return isValid;
                        
                    case 'phone':
                        const phoneRegex = /^[0-9]{10}$/;
                        const isValidPhone = phoneRegex.test(value);
                        fieldValidity.phone = isValidPhone;
                        errorElement.style.display = isValidPhone ? 'none' : 'block';
                        return isValidPhone;
                        
                    default:
                        return true;
                }
            }
            
            // Función para verificar si todos los campos son válidos
            function checkFormValidity() {
                const allValid = Object.values(fieldValidity).every(valid => valid);
                registerButton.disabled = !allValid;
            }
            
            // Añadir event listeners a todos los campos
            formFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.addEventListener('input', function() {
                        validateField(fieldId, this.value);
                        checkFormValidity();
                    });
                    
                    field.addEventListener('blur', function() {
                        validateField(fieldId, this.value);
                    });
                }
            });
            
            // Manejo del envío del formulario
            registrationForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Verificar que todos los campos sean válidos
                let allValid = true;
                formFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field && !validateField(fieldId, field.value)) {
                        allValid = false;
                    }
                });
                
                if (allValid) {
                    // Simular envío del formulario
                    registerButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Registrando...';
                    registerButton.disabled = true;
                    
                    setTimeout(() => {
                        alert('¡Registro exitoso! Tu cuenta ha sido creada.');
                        registrationForm.reset();
                        registerButton.innerHTML = '<i class="fas fa-user-plus me-2"></i>Registrar';
                        registerButton.disabled = true;
                        
                        // Resetear estado de validación
                        Object.keys(fieldValidity).forEach(key => {
                            fieldValidity[key] = false;
                        });
                        
                        // Resetear barra de fortaleza de contraseña
                        passwordStrength.className = 'password-strength';
                    }, 2000);
                } else {
                    alert('Por favor, corrige los errores en el formulario antes de enviar.');
                }
            });
            
            // Botón para volver atrás
            backButton.addEventListener('click', function() {
                if (confirm('¿Estás seguro de que quieres salir? Se perderán los datos no guardados.')) {
                    window.location.href = 'login.html'; // Cambiar por la URL real de tu página de login
                }
            });
        });
    </script>
</body>
</html>