@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-red-800 to-yellow-500">
    <div class="w-full max-w-md bg-white shadow-xl rounded-lg overflow-hidden p-6">

        <!-- Logo del Municipio -->
        <div class="flex justify-center">
            <img src="{{ asset('assets/img/logo-tarija.png') }}" alt="Logo Municipio Tarija" class="h-20 w-auto">
        </div>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-center text-gray-700 mt-4 uppercase">{{ __('Verificación de Correo') }}</h2>

        <!-- Contenido -->
        <div class="text-gray-600 text-center mt-4">
            @if (session('resent'))
                <div class="bg-green-100 text-green-800 p-3 rounded-lg shadow-md">
                    <p>{{ __('Un nuevo enlace de verificación ha sido enviado a tu correo.') }}</p>
                </div>
            @endif

            <p class="mt-4">{{ __('Antes de continuar, revisa tu correo electrónico para encontrar el enlace de verificación.') }}</p>
            <p class="mt-2">{{ __('Si no recibiste el correo, puedes solicitar otro.') }}</p>
        </div>

        <!-- Botón para reenviar el correo -->
        <form class="mt-6 text-center" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300">
                <i class="fa fa-envelope mr-2"></i> {{ __('Reenviar Correo de Verificación') }}
            </button>
        </form>

        <!-- Enlace de ayuda -->
        <div class="text-center mt-4">
            <p class="text-gray-600 text-sm">
                ¿Necesitas ayuda? <a href="#" class="text-red-600 hover:underline font-semibold">Contáctanos</a>.
            </p>
        </div>
    </div>
</div>
@endsection
