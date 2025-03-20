<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserRole
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param mixed ...$roles Los roles permitidos (por ejemplo, 1, 2, etc.)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Obtener el usuario autenticado del guard 'funcionario'
        $user = Auth::guard('funcionario')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Verificar si el rol del usuario está entre los roles permitidos
        if (!in_array($user->rol_personal, $roles)) {
            // Puedes redirigir a una vista de error, dashboard o donde necesites
            return redirect()->route('dashboard')->withErrors(['error' => 'No tienes permisos para acceder a esta sección.']);
        }

        return $next($request);
    }
}

