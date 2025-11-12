<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        // Verificar si hay usuario autenticado
        if (!$user) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión.');
        }

        // Si el usuario no tiene el rol requerido, se bloquea el acceso
        if (!$user->hasRole($role)) {
            // Redirigir según el tipo de usuario
            if ($user->isAdmin()) {
                return redirect()->route('dashboardadmin');
            } elseif ($user->isPlayer()) {
                return redirect()->route('dashboard');
            } else {
                abort(403, 'Acceso no autorizado');
            }
        }

        return $next($request);
    }
}
