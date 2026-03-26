<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ← agregar este use
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    public function handle(Request $request, Closure $next, string ...$rolesPermitidos): Response
    {
        // 1. ¿Está autenticado?
        if (!Auth::check()) { // ← cambiar auth() por Auth::
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión.');
        }

        // 2. ¿Tiene alguno de los roles requeridos?
        $rolUsuario = Auth::user()->rol; // ← cambiar auth() por Auth::

        if (!in_array($rolUsuario, $rolesPermitidos)) {
            return redirect()->route('dashboard')
                ->with('error', 'No tienes permiso para acceder a esta sección.');
        }

        // 3. Todo correcto → continuar
        return $next($request);
    }
}