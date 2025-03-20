@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-red-700 via-yellow-500 to-white">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">

        <!-- Logo de la empresa -->
        <div class="flex justify-center">
            <img src="{{ asset('assets/img/logo-tarija.png') }}" alt="Logo Empresa" class="h-20 w-auto">
        </div>

        <!-- Título del login -->
        <h2 class="text-center text-2xl font-bold text-red-700 mt-4">Acceso al Sistema</h2>
        <p class="text-center text-gray-600 text-sm mb-6">Ingrese sus credenciales para continuar</p>

        <!-- Mensaje de error general -->
        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Campo Correo o Nombre de Usuario -->
            <div class="mb-4">
                <label for="login" class="block text-gray-700 font-semibold mb-1">Correo Electrónico o Nombre de Usuario</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                    placeholder="Ingrese su correo o nombre de usuario">
                @if($errors->has('login'))
                    <span class="text-red-600 text-sm">{{ $errors->first('login') }}</span>
                @endif
            </div>

            <!-- Campo Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-1">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                    placeholder="Ingrese su contraseña">
                @if($errors->has('password'))
                    <span class="text-red-600 text-sm">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Recordar sesión -->
            <div class="flex justify-between items-center mb-4">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                    Recordarme
                </label>
                <!-- Si no implementas el restablecimiento de contraseña, elimina o comenta este enlace -->
                <!-- <a href="{{ route('password.request') }}" class="text-red-600 text-sm hover:underline">
                    ¿Olvidaste tu contraseña?
                </a> -->
            </div>

            <!-- Botón de Login -->
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300">
                Iniciar Sesión
            </button>
        </form>

        <!-- Separador -->
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-3 text-gray-500 text-sm">O</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <!-- Botón de Regístrate -->
        <p class="text-center text-gray-700 text-sm">¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-red-600 font-semibold hover:underline">Regístrate</a>
        </p>
    </div>
</div>
@endsection
