<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


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