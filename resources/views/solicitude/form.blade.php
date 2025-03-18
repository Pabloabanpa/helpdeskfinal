<div class="container mx-auto mt-4 max-w-2xl">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ isset($solicitude) ? __('Editar Solicitud') : __('Nueva Solicitud') }}</h4>
        </div>
    </div>
    <div class="float-right">
        <a class="btn btn-primary btn-sm" href="{{ route('dashboard') }}"> {{ __('Back') }}</a>
    </div>
</div>

@php
    $solicitude = $solicitude ?? null;
@endphp

<form action="{{ isset($solicitude) ? route('solicitudes.update', $solicitude->id) : route('solicitudes.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($solicitude))
        @method('PUT')
    @endif

    <div class="mt-4">
        <!-- Selección de Funcionario -->
        <div class="mb-4">
            <label for="funcionario_id" class="font-semibold text-gray-700">{{ __('Funcionario') }}</label>
            <select name="funcionario_id" id="funcionario_id" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                <option value="" disabled {{ !isset($solicitude) ? 'selected' : '' }}>Seleccione un funcionario</option>
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}"
                        {{ old('funcionario_id', $solicitude->funcionario_id ?? '') == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->username ?? 'Sin Username' }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Checkbox para equipo -->
        <div class="flex items-center mb-4">
            <input type="checkbox" id="sin_equipo" name="sin_equipo" class="hidden peer"
                {{ isset($solicitude) && !$solicitude->equipo_id ? 'checked' : '' }}>
            <label for="sin_equipo" class="cursor-pointer w-14 h-7 flex items-center bg-gray-300 rounded-full p-1 duration-300 peer-checked:bg-green-500 peer-checked:ring-2 peer-checked:ring-green-300">
                <div class="bg-white w-6 h-6 rounded-full shadow-md transform duration-300 peer-checked:translate-x-7"></div>
            </label>
            <span class="ml-3 text-gray-600 font-medium">No tengo un equipo asignado</span>
        </div>

        <!-- Código de equipo -->
        <div class="mb-4" id="equipoField" style="{{ isset($solicitude) && !$solicitude->equipo_id ? 'display:none;' : '' }}">
            <label for="equipo_id" class="font-semibold text-gray-700">{{ __('Código de equipo') }}</label>
            <input type="text" name="equipo_id" id="equipo_id" placeholder="Ingrese el código del equipo"
                   class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                   value="{{ old('equipo_id', $solicitude->equipo_id ?? '') }}">
        </div>

        <!-- Carga de archivo -->
        <div class="mb-4" id="archivoField" style="display: none;">
            <label class="font-semibold text-gray-700">{{ __('Cargar Autorización (PDF o Word)') }}</label>
            <div class="w-full border-2 border-dashed border-blue-500 rounded-lg p-6 text-center cursor-pointer bg-gray-100 hover:bg-gray-200 transition duration-300">
                <svg class="mx-auto h-10 w-10 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l6-6m0 0l6 6m-6-6v12"></path>
                </svg>
                <p class="mt-2 text-gray-500">Arrastra y suelta un archivo aquí o</p>
                <label class="text-blue-600 font-medium cursor-pointer">
                    selecciona un archivo
                    <input type="file" name="archivo" id="archivo" class="hidden" accept=".pdf,.doc,.docx">
                </label>
                <p class="mt-2 text-gray-500 text-sm">Formatos permitidos: PDF, DOC, DOCX</p>
                <span id="archivoSeleccionado" class="text-gray-600 text-sm font-medium mt-2 block">
                    @if(isset($solicitude) && $solicitude->archivo)
                        Archivo actual: <a href="{{ asset('storage/' . $solicitude->archivo) }}" class="text-blue-500 underline" target="_blank">Ver archivo</a>
                    @endif
                </span>
            </div>
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label for="descripcion_solicitud" class="font-semibold text-gray-700">{{ __('Descripción de la Solicitud') }}</label>
            <textarea name="descripcion_solicitud" id="descripcion_solicitud" rows="3" placeholder="Ingrese la descripción..."
                      class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">{{ old('descripcion_solicitud', $solicitude->descripcion_solicitud ?? '') }}</textarea>
        </div>

        <!-- Estado -->
        <div class="mb-4">
            <label for="estado" class="font-semibold text-gray-700">{{ __('Estado de la Solicitud') }}</label>
            <select name="estado" id="estado" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                @foreach(['en espera', 'en proceso', 'finalizada', 'cancelada'] as $estado)
                    <option value="{{ $estado }}" {{ old('estado', $solicitude->estado ?? '') == $estado ? 'selected' : '' }}>
                        {{ ucfirst($estado) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Fecha de Creación -->
        <div class="mb-4">
            <label for="fecha_creacion" class="font-semibold text-gray-700">{{ __('Fecha de Creación') }}</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion"
                   value="{{ old('fecha_creacion', isset($solicitude) ? $solicitude->fecha_creacion : date('Y-m-d')) }}"
                   class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
        </div>

        <!-- Tipo de Solicitud -->
        <div class="mb-4">
            <label for="tipo_solicitud" class="font-semibold text-gray-700">{{ __('Tipo de Solicitud') }}</label>
            <select name="tipo_solicitud" id="tipo_solicitud" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                @foreach(['incidencia_hardware', 'incidencia_software', 'conectividad_redes', 'instalacion_configuracion', 'acceso_permisos'] as $tipo)
                    <option value="{{ $tipo }}" {{ old('tipo_solicitud', $solicitude->tipo_solicitud ?? '') == $tipo ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $tipo)) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                {{ __('Enviar Solicitud') }}
            </button>
        </div>
    </div>
</form>



<!-- Script para mostrar el nombre del archivo seleccionado -->
<script>
    document.getElementById('archivo').addEventListener('change', function() {
        let fileName = this.files.length > 0 ? this.files[0].name : 'Ningún archivo seleccionado';
        document.getElementById('archivoSeleccionado').textContent = "Archivo seleccionado: " + fileName;
    });
</script>
