<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function() {

            // Escuchar cambios en el checkbox sin_equipo dentro de #contenido
            $(document).on('change', '#sin_equipo', function() {
                let equipoField = $('#equipoField');
                let equipoIdInput = $('#equipo_id');
                let archivoField = $('#archivoField');

                if ($(this).is(':checked')) {
                    archivoField.show();   // Mostrar el campo de archivo
                    equipoField.hide();    // Ocultar el campo de código del equipo
                    equipoIdInput.val(''); // Borrar el contenido del campo de código
                } else {
                    archivoField.hide();   // Ocultar el campo de archivo
                    equipoField.show();    // Mostrar el campo de código del equipo
                }
            });

            // Ejecutar el cambio cuando se carga dinámicamente el formulario
            $(document).on('ajaxComplete', function() {
                let checkbox = $('#sin_equipo');
                if (checkbox.length) {
                    checkbox.trigger('change'); // Simula un cambio para aplicar los efectos de inmediato
                }
            });

        });
    </script>
    <script>
        document.getElementById('archivo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const archivoSeleccionado = document.getElementById('archivoSeleccionado');

            if (file) {
                const allowedExtensions = ['pdf', 'doc', 'docx'];
                const fileExtension = file.name.split('.').pop().toLowerCase();

                if (allowedExtensions.includes(fileExtension)) {
                    archivoSeleccionado.textContent = `Archivo seleccionado: ${file.name}`;
                    archivoSeleccionado.classList.remove('text-red-500');
                    archivoSeleccionado.classList.add('text-green-600');
                } else {
                    archivoSeleccionado.textContent = 'Error: Solo se permiten archivos PDF o Word';
                    archivoSeleccionado.classList.remove('text-green-600');
                    archivoSeleccionado.classList.add('text-red-500');
                    event.target.value = ''; // Reinicia el campo de archivo
                }
            } else {
                archivoSeleccionado.textContent = ''; // Limpia el mensaje si se cancela la selección
            }
        });
        </script>




</body>
</html>
