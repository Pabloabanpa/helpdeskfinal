<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de que la vista se llama así
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validamos la solicitud
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Mapeamos el input "email" al campo "email_inst"
        $credentials = [
            'email_inst' => $request->input('email'),
            'password'   => $request->input('password')
        ];

        // Si usaste la opción A (guard web) o la opción B (guard funcionarios), ajusta según corresponda:
        // Opción A:
        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/dashboard');
        }

        // Opción B (si configuraste el guard "funcionarios"):
        /*
        if (Auth::guard('funcionarios')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/dashboard');
        }
        */

        // Si la autenticación falla, se redirige de nuevo con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput($request->only('email', 'remember'));
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        // Ajusta el guard según corresponda
        Auth::guard('web')->logout();
        // Auth::guard('funcionarios')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
