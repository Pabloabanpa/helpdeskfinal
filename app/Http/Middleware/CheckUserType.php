<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$types  Los tipos de usuario permitidos (por ejemplo, 1, 2, etc.)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        // Verifica que exista un usuario autenticado en el guard "funcionario"
        $user = Auth::guard('funcionario')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Si se pasan tipos, verifica que el rol del usuario esté entre ellos.
        if (!empty($types) && !in_array($user->rol_personal, $types)) {
            return redirect()->route('dashboard')->withErrors('No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
