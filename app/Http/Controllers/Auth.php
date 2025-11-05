<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Muestra el formulario para solicitar reset
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Envía el link de reset (en tu caso, reseteará directamente)
     */
    public function store(Request $request)
    {
        $request->validate([
            'correo' => ['required', 'email'],
        ]);

        // Busca el usuario
        $user = User::where('correo', $request->correo)
                    ->where('active', 1)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'correo' => 'No encontramos un usuario con ese correo electrónico.',
            ]);
        }

        // Genera un token único
        $token = Str::random(64);

        // Guarda el token en la tabla password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['correo' => $request->correo],
            [
                'token' => Hash::make($token),
                'created_at' => now(),
            ]
        );

        // Aquí deberías enviar un email con el link
        // Por ahora, redirigimos directamente al formulario de reset
        // En producción, enviarías: Mail::to($user->correo)->send(new ResetPasswordEmail($token));

        return redirect()->route('password.reset', ['token' => $token])
                        ->with('status', 'Te hemos enviado el enlace para restablecer tu contraseña.');
    }
}

class NewPasswordController extends Controller
{
    /**
     * Muestra el formulario de nueva contraseña
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Guarda la nueva contraseña
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'correo' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Verifica el token
        $resetRecord = DB::table('password_reset_tokens')
                         ->where('correo', $request->correo)
                         ->first();

        if (!$resetRecord) {
            return back()->withErrors(['correo' => 'Token inválido o expirado.']);
        }

        // Verifica que el token coincida
        if (!Hash::check($request->token, $resetRecord->token)) {
            return back()->withErrors(['correo' => 'Token inválido.']);
        }

        // Verifica que no haya expirado (60 minutos)
        if (now()->diffInMinutes($resetRecord->created_at) > 60) {
            return back()->withErrors(['correo' => 'El token ha expirado.']);
        }

        // Actualiza la contraseña del usuario
        $user = User::where('correo', $request->correo)->first();

        if (!$user) {
            return back()->withErrors(['correo' => 'Usuario no encontrado.']);
        }

        // Actualiza la contraseña en la tabla usuarios
        $user->update([
            'password' => Hash::make($request->password),
            'modified' => now(),
            'modified_by' => $user->id_usuario, // Se modifica a sí mismo
        ]);

        // Elimina el token usado
        DB::table('password_reset_tokens')
          ->where('correo', $request->correo)
          ->delete();

        return redirect()->route('login')
                        ->with('status', 'Tu contraseña ha sido restablecida correctamente.');
    }
}