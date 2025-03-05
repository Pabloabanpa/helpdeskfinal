<div class="row padding-1 p-1">
    <div class="col-md-12">

        <!-- Selección de Funcionario -->
        <div class="form-group mb-2 mb20">
            <label for="funcionario_id" class="form-label">{{ __('Funcionario') }}</label>
            <select name="funcionario_id" id="funcionario_id" class="form-control @error('funcionario_id') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un funcionario</option>
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}"
                        {{ old('funcionario_id', $solicitude?->funcionario_id) == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario?->username ?? 'Sin Username' }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('funcionario_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Checkbox para indicar si no se tiene un equipo -->
        <div class="form-group mb-2 mb20">
            <input type="checkbox" id="sin_equipo" name="sin_equipo" class="mr-2">
            <label for="sin_equipo" class="text-gray-600">No tengo un equipo asignado</label>
        </div>

        <!-- Campo para ingresar el código del equipo (se oculta si el checkbox está marcado) -->
        <div class="form-group mb-2 mb20" id="equipoField">
            <label for="equipo_id" class="form-label">{{ __('Código de equipo') }}</label>
            <input type="text" name="equipo_id" class="form-control @error('equipo_id') is-invalid @enderror"
                   value="{{ old('equipo_id', $solicitude?->equipo_id) }}" id="equipo_id" placeholder="Coloque el código del equipo">
            {!! $errors->first('equipo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de Archivo (Solo aparece si no se tiene un equipo) -->
        <div class="form-group mb-2 mb20" id="archivoField" style="display: none;">
            <label for="archivo" class="form-label">{{ __('Archivo (PDF o Word)') }}</label>
            <input type="file" name="archivo" class="form-control @error('archivo') is-invalid @enderror" id="archivo" accept=".pdf,.doc,.docx" placeholder="Cargue aquí su autorización">
            {!! $errors->first('archivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo Descripción de la Solicitud -->
        <div class="form-group mb-2 mb20">
            <label for="descripcion_solicitud" class="form-label">{{ __('Descripción Solicitud') }}</label>
            <input type="text" name="descripcion_solicitud" class="form-control @error('descripcion_solicitud') is-invalid @enderror"
                   value="{{ old('descripcion_solicitud', $solicitude?->descripcion_solicitud) }}" id="descripcion_solicitud" placeholder="Ingrese la descripción de la solicitud">
            {!! $errors->first('descripcion_solicitud', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo Estado con opciones predefinidas -->
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                <option value="en espera" {{ old('estado', $solicitude?->estado) == 'en espera' ? 'selected' : '' }}>En espera</option>
                <option value="en proceso" {{ old('estado', $solicitude?->estado) == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="finalizada" {{ old('estado', $solicitude?->estado) == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
                <option value="cancelada" {{ old('estado', $solicitude?->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo Fecha de Creación con Datepicker -->
        <div class="form-group mb-2 mb20">
            <label for="fecha_creacion" class="form-label">{{ __('Fecha Creación') }}</label>
            <input type="date" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror"
                   value="{{ old('fecha_creacion', $solicitude?->fecha_creacion ?? date('Y-m-d')) }}" id="fecha_creacion">
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Selección de Funcionario de Soporte -->
        <div class="form-group mb-2 mb20">
            <label for="funcionarios_soportes_id" class="form-label">{{ __('Funcionario de Soporte') }}</label>
            <select name="funcionarios_soportes_id" id="funcionarios_soportes_id" class="form-control @error('funcionarios_soportes_id') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un funcionario de soporte</option>
                @foreach ($funcionariosSoporte as $funcionario)
                    <option value="{{ $funcionario->id }}"
                        {{ old('funcionarios_soportes_id', $solicitude?->funcionarios_soportes_id) == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->username ?? 'Sin Username' }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('funcionarios_soportes_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

<!-- Campo tipo_solicitudes con opciones predefinidas -->
<div class="form-group mb-2 mb20">
    <label for="tipo_solicitud" class="form-label">{{ __('Tipo De Solicitud') }}</label>
    <select name="tipo_solicitud" id="tipo_solicitud" class="form-control @error('tipo_solicitud') is-invalid @enderror">
        <option value="incidencia_hardware" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'incidencia_hardware' ? 'selected' : '' }}>Incidencia de Hardware</option>
        <option value="incidencia_software" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'incidencia_software' ? 'selected' : '' }}>Incidencia de Software</option>
        <option value="conectividad_redes" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'conectividad_redes' ? 'selected' : '' }}>Conectividad y Redes</option>
        <option value="instalacion_configuracion" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'instalacion_configuracion' ? 'selected' : '' }}>Instalación y Configuración</option>
        <option value="acceso_permisos" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'acceso_permisos' ? 'selected' : '' }}>Acceso y Permisos</option>
        <option value="mantenimiento_preventivo" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'mantenimiento_preventivo' ? 'selected' : '' }}>Mantenimiento Preventivo</option>
        <option value="consultas_capacitacion" {{ old('tipo_solicitud', $solicitude?->tipo_solicitud) == 'consultas_capacitacion' ? 'selected' : '' }}>Consultas y Capacitación</option>
    </select>
    {!! $errors->first('tipo_solicitud', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
</div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<!-- JavaScript para alternar la visibilidad de los campos -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const equipoField = document.getElementById('equipoField');
        const equipoIdInput = document.getElementById('equipo_id');
        const sinEquipoCheckbox = document.getElementById('sin_equipo');
        const archivoField = document.getElementById('archivoField');

        function toggleFields() {
            if (sinEquipoCheckbox.checked) {
                archivoField.style.display = 'block';
                equipoField.style.display = 'none';
                equipoIdInput.value = ''; // Borra el contenido del campo equipo_id
            } else {
                archivoField.style.display = 'none';
                equipoField.style.display = 'block';
            }
        }

        // Detectar cambios en el checkbox
        sinEquipoCheckbox.addEventListener('change', toggleFields);

        // Ejecutar la función al cargar la página por si hay valores previos
        toggleFields();
    });
</script>
