<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Muestra el formulario de registro personalizado
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Maneja el registro de nuevos usuarios
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'correo' => ['required', 'string', 'email', 'max:100', 'unique:usuarios,correo'],
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_p' => ['required', 'string', 'max:30'],
            'apellido_m' => ['required', 'string', 'max:30'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_facebook' => ['nullable', 'string', 'max:255'], // Facebook
            'user_instagram' => ['nullable', 'string', 'max:255'], // Instagram
            'user_x' => ['nullable', 'string', 'max:255'], // User_X
            'telefono' => ['required', 'string', 'max:20'], // Número de Telefono
            'genero' => ['required', 'in:masculino,femenino,otro'], // Género
            'edad' => ['required', 'integer', 'min:18'], // Edad
        ], [
            // Mensajes personalizados en español
            'usuario.required' => 'El usuario es obligatorio.',
            'correo.unique' => 'Este usuario ya está registrado.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe ser un correo electrónico válido.',
            'correo.unique' => 'Este correo ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido_p.required' => 'El primer apellido es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'telefono.required' => 'El número de Telefono es obligatorio.',
            'genero.required' => 'El género es obligatorio.',
            'genero.in' => 'El género debe ser uno de los siguientes: masculino, femenino, otro.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad debe ser al menos 18 años.',
            // Instagram
            'user_instagram.string' => 'El usuario de Instagram debe ser texto válido.',
            'user_instagram.max' => 'El usuario de Instagram no puede exceder los 255 caracteres.',

            // Facebook
            'user_facebook.string' => 'El usuario de Facebook debe ser texto válido.',
            'user_facebook.max' => 'El usuario de Facebook no puede exceder los 255 caracteres.',

            // X (Twitter)
            'user_x.string' => 'El usuario de X debe ser texto válido.',
            'user_x.max' => 'El usuario de X no puede exceder los 255 caracteres.',

            // Edad
            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.min' => 'Debes tener al menos 18 años para registrarte.',
        ]);

        // Buscar el id del nivel "Jugador" en la tabla nivel_usuarios
        $nivelJugador = \App\Models\NivelUsuario::where('nombre_rol', 'Jugador')
            ->where('active', 1)
            ->first();

        if (!$nivelJugador) {
            // Si no existe, crearlo
            $nivelJugador = \App\Models\NivelUsuario::create([
                'nombre_rol' => 'Jugador',
                'active' => 1,
                'created' => now(),
            ]);
        }

        // Crear el usuario
        $user = User::create([
            'usuario' => $request->correo,
            'correo' => $request->correo,
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'password' => Hash::make($request->password),
            'active' => 1, // Usuario activo por defecto
            'id_nivel_usuario' => $nivelJugador->id_nivel_usuario,
            'created' => now(),
            'created_by' => null,
            'user_facebook' => $request->user_facebook ?? 'N/A',
            'user_instagram' => $request->user_instagram ?? 'N/A',
            'user_x' => $request->user_x ?? 'N/A',

            'telefono' => $request->telefono,
            'genero' => $request->genero,
            'edad' => $request->edad,
        ]);

        // Disparar evento de registro
        event(new Registered($user));

        // Loguear automáticamente al usuario
        Auth::login($user);

        // Redirigir al dashboard o a la página del juego
        return redirect()->route('dashboard')
            ->with('success', '¡Bienvenido! Tu cuenta ha sido creada exitosamente.');
    }
    public function editar(Request $request): RedirectResponse
    {
        // Validación de campos
        $request->validate([

            'correo' => ['required', 'string', 'email', 'max:100', 'unique:usuarios,correo'],
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_p' => ['required', 'string', 'max:30'],
            'apellido_m' => ['required', 'string', 'max:30'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_facebook' => ['nullable', 'string', 'max:255'], // Facebook
            'user_instagram' => ['nullable', 'string', 'max:255'], // Instagram
            'user_x' => ['nullable', 'string', 'max:255'], // User_X
            'telefono' => ['required', 'string', 'max:20'], // Número de Telefono
            'genero' => ['required', 'in:masculino,femenino,otro'], // Género
            'edad' => ['required', 'integer', 'min:18'], // Edad
        ], [
            // Mensajes personalizados en español
            'usuario.required' => 'El usuario es obligatorio.',
            'correo.unique' => 'Este usuario ya está registrado.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe ser un correo electrónico válido.',
            'correo.unique' => 'Este correo ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido_p.required' => 'El primer apellido es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'telefono.required' => 'El número de Telefono es obligatorio.',
            'genero.required' => 'El género es obligatorio.',
            'genero.in' => 'El género debe ser uno de los siguientes: masculino, femenino, otro.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad debe ser al menos 18 años.',
            // Instagram
            'user_instagram.string' => 'El usuario de Instagram debe ser texto válido.',
            'user_instagram.max' => 'El usuario de Instagram no puede exceder los 255 caracteres.',

            // Facebook
            'user_facebook.string' => 'El usuario de Facebook debe ser texto válido.',
            'user_facebook.max' => 'El usuario de Facebook no puede exceder los 255 caracteres.',

            // X (Twitter)
            'user_x.string' => 'El usuario de X debe ser texto válido.',
            'user_x.max' => 'El usuario de X no puede exceder los 255 caracteres.',

            // Edad
            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.min' => 'Debes tener al menos 18 años para registrarte.',
        ]);

        // Buscar el id del nivel "Jugador" en la tabla nivel_usuarios
        $nivelJugador = \App\Models\NivelUsuario::where('nombre_rol', 'Jugador')
            ->where('active', 1)
            ->first();

        if (!$nivelJugador) {
            // Si no existe, crearlo
            $nivelJugador = \App\Models\NivelUsuario::create([
                'nombre_rol' => 'Jugador',
                'active' => 1,
                'created' => now(),
            ]);
        }

        // Crear el usuario
        $user = User::create([
            'usuario' => $request->correo,
            'correo' => $request->correo,
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'password' => Hash::make($request->password),
            'active' => 1, // Usuario activo por defecto
            'id_nivel_usuario' => $nivelJugador->id_nivel_usuario,
            'created' => now(),
            'created_by' => null,
            'user_facebook' => $request->user_facebook ?? 'N/A',
            'user_instagram' => $request->user_instagram ?? 'N/A',
            'user_x' => $request->user_x ?? 'N/A',
            'telefono' => $request->telefono,
            'genero' => $request->genero,
            'edad' => $request->edad,
        ]);

        // Disparar evento de registro
        event(new Registered($user));

        // Loguear automáticamente al usuario
        Auth::login($user);

        // Redirigir al dashboard o a la página del juego
        return redirect()->route('dashboard')
            ->with('success', '¡Bienvenido! Tu cuenta ha sido creada exitosamente.');
    }
}
