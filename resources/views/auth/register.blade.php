@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-red-800 to-yellow-500">
    <div class="w-full max-w-md bg-white shadow-xl rounded-lg overflow-hidden p-6">

        <!-- Logo del Municipio -->
        <div class="flex justify-center">
            <img src="{{ asset('assets/img/logo-tarija.png') }}" alt="Logo Municipio Tarija" class="h-20 w-auto">
        </div>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-center text-gray-700 mt-4 uppercase">{{ __('Registro de Usuario') }}</h2>

        <!-- Formulario -->
        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">{{ __('Nombre') }}</label>
                <div class="relative">
                    <input id="name" type="text" class="w-full p-3 border rounded-lg focus:ring focus:ring-yellow-300 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <i class="fa fa-user absolute top-4 right-4 text-gray-400"></i>
                </div>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">{{ __('Correo Electrónico') }}</label>
                <div class="relative">
                    <input id="email" type="email" class="w-full p-3 border rounded-lg focus:ring focus:ring-yellow-300 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <i class="fa fa-envelope absolute top-4 right-4 text-gray-400"></i>
                </div>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">{{ __('Contraseña') }}</label>
                <div class="relative">
                    <input id="password" type="password" class="w-full p-3 border rounded-lg focus:ring focus:ring-yellow-300 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                    <i class="fa fa-lock absolute top-4 right-4 text-gray-400"></i>
                </div>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700 font-semibold">{{ __('Confirmar Contraseña') }}</label>
                <div class="relative">
                    <input id="password-confirm" type="password" class="w-full p-3 border rounded-lg focus:ring focus:ring-yellow-300" name="password_confirmation" required autocomplete="new-password">
                    <i class="fa fa-lock absolute top-4 right-4 text-gray-400"></i>
                </div>
            </div>

            <!-- Botón de Registro -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300">
                    <i class="fa fa-user-plus mr-2"></i>{{ __('Registrarse') }}
                </button>
            </div>

            <!-- Enlace a Login -->
            <div class="text-center mt-4">
                <p class="text-gray-600 text-sm">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-red-600 hover:underline font-semibold">Inicia sesión aquí</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
