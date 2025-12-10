<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verifica si hay usuario autenticado
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Verifica si el usuario tiene el rol requerido
        if (!$request->user()->hasRole($role)) {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        // Procesa la petición
        $response = $next($request);

        // Evitar cache del navegador
        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }
}
