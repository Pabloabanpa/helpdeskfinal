<div class="row padding-1 p-1">
    <div class="col-md-12">

        <!-- Campo para seleccionar un funcionario por su username -->
        <div class="form-group mb-2 mb20">
            <label for="funcionario_id" class="form-label">{{ __('Funcionario (Username)') }}</label>
            <select name="funcionario_id" class="form-control @error('funcionario_id') is-invalid @enderror" id="funcionario_id">
                <option value="">Selecciona un funcionario</option>
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}"
                        {{ old('funcionario_id', $funcionariosSoporte?->funcionario_id) == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->username }}
                    </option>
                @endforeach
            </select>

            <!-- Muestra un mensaje de error si la selección del funcionario es inválida -->
            {!! $errors->first('funcionario_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para el nombre de usuario -->
        <div class="form-group mb-2 mb20">
            <label for="username" class="form-label">{{ __('Username') }}</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username', $funcionariosSoporte?->username) }}" id="username" placeholder="Username">

            <!-- Muestra un mensaje de error si el nombre de usuario es inválido -->
            {!! $errors->first('username', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para la contraseña -->
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" placeholder="Ingresa tu contraseña">

            <!-- Muestra un mensaje de error si la contraseña es inválida -->
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo para seleccionar un rol -->
        <div class="form-group mb-2 mb20">
            <label for="rol_id" class="form-label">{{ __('Rol') }}</label>
            <select name="rol_id" class="form-control @error('rol_id') is-invalid @enderror" id="rol_id">
                <option value="">Selecciona un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ old('rol_id', $funcionariosSoporte?->rol_id) == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre }}
                    </option>
                @endforeach
            </select>

            <!-- Muestra un mensaje de error si el rol es inválido -->
            {!! $errors->first('rol_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo para seleccionar el nivel de atencion (Redes/Desarrollo/Soporte tecnico) -->
        <div class="form-group mb-2 mb20">
            <label for="nivel_atencion" class="form-label">{{ __('Nivel de Atencion') }}</label>
            <select name="nivel_atencion" id="nivel_atencion" class="form-control @error('nivel_atencion') is-invalid @enderror">
                <option value="Redes" {{ old('nivel_atencion', $funcionariosSoporte?->nivel_atencion) == 'Redes' ? 'selected' : '' }}>Redes</option>
                <option value="Desarrollo" {{ old('nivel_atencion', $funcionariosSoporte?->nivel_atencion) == 'Desarrollo' ? 'selected' : '' }}>Desarrollo</option>
                <option value="Soporte Técnico" {{ old('nivel_atencion', $funcionariosSoporte?->nivel_atencion) == 'Soporte Técnico' ? 'selected' : '' }}>Soporte Técnico</option>

            </select>

        <!-- Campo para seleccionar el estado (Activo/Inactivo) -->
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                <option value="activo" {{ old('estado', $funcionariosSoporte?->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $funcionariosSoporte?->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>

            <!-- Muestra un mensaje de error si el estado es inválido -->
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para la fecha de creación -->
        <div class="form-group mb-2 mb20">
            <label for="fecha_creacion" class="form-label">{{ __('Fecha Creación') }}</label>
            <input type="date" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror"
                   value="{{ old('fecha_creacion', $funcionariosSoporte?->fecha_creacion) }}" id="fecha_creacion">

            <!-- Muestra un mensaje de error si la fecha de creación es inválida -->
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <!-- Botón para enviar el formulario -->
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
