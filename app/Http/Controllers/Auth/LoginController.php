<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Funcionario;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa el login.
     */
    public function login(Request $request)
    {
        // Validar la entrada usando el campo "login" (que puede ser username o correo)
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Capturar el valor ingresado (puede ser username o correo)
        $loginInput = $request->input('login');

        // Detectar si es un correo válido o un username
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email_inst' : 'username';

        // Buscar al funcionario en la base de datos usando el campo detectado
        $user = Funcionario::where($fieldType, $loginInput)->first();

        // Verificar que se encuentre el usuario y que la contraseña sea correcta
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::guard('funcionario')->login($user);
            return redirect()->route('dashboard');
        }

        // Si la autenticación falla, se retorna al formulario con error y se conserva el input
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('login', 'remember'));
    }

    /**
     * Cierra la sesión del funcionario.
     */
    public function logout(Request $request)
    {
        Auth::guard('funcionario')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
