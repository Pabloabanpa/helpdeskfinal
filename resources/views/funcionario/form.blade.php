<!-- Contenedor principal del formulario con estructura de filas y columnas -->
<div class="row padding-1 p-1">
    <div class="col-md-12">

        <!-- Campo para seleccionar una persona -->
        <div class="form-group mb-2 mb20">
            <label for="persona" class="form-label">{{ __('Persona') }}</label>
            <select name="persona" class="form-control @error('persona') is-invalid @enderror" id="persona">
                <option value="">Selecciona una persona</option>
                @foreach ($personas as $persona)
                    <option value="{{ $persona->id }}"
                        {{ old('persona', $funcionario?->persona) == $persona->id ? 'selected' : '' }}>
                        {{ $persona->nombre_persona }} {{ $persona->apellido_persona }}
                    </option>
                @endforeach
            </select>
            <!-- Muestra errores si hay problemas con la selección de persona -->
            {!! $errors->first('persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para el nombre de usuario -->
        <div class="form-group mb-2 mb20">
            <label for="username" class="form-label">{{ __('Username') }}</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
            value="{{ old('username', $funcionario?->username) }}" id="username" placeholder="Usuario">
            {!! $errors->first('username', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para la contraseña -->
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="password" placeholder="Ingresa tu contraseña">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para el correo institucional -->
        <div class="form-group mb-2 mb20">
            <label for="email_inst" class="form-label">{{ __('Email Inst') }}</label>
            <input type="text" name="email_inst" class="form-control @error('email_inst') is-invalid @enderror"
            value="{{ old('email_inst', $funcionario?->email_inst) }}" id="email_inst" placeholder="Email Inst">
            {!! $errors->first('email_inst', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para el cargo del funcionario -->
        <div class="form-group mb-2 mb20">
            <label for="cargo" class="form-label">{{ __('Cargo') }}</label>
            <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror"
            value="{{ old('cargo', $funcionario?->cargo) }}" id="cargo" placeholder="Cargo">
            {!! $errors->first('cargo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo para seleccionar la oficina -->
        <div class="form-group mb-2 mb20">
            <label for="oficina" class="form-label">{{ __('Oficina') }}</label>
            <select name="oficina" class="form-control @error('oficina') is-invalid @enderror" id="oficina">
                <option value="">Selecciona una oficina</option>
                @foreach ($oficinas as $oficina)
                    <option value="{{ $oficina->id }}"
                        {{ old('oficina', $funcionario?->oficina) == $oficina->id ? 'selected' : '' }}>
                        {{ $oficina->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('oficina', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo para subir una imagen de perfil -->
        <div class="form-group mb-2 mb20">
            <label for="imagen" class="form-label">{{ __('Imagen de Perfil') }}</label>
            <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror"
            id="imagen" accept="image/*">
            {!! $errors->first('imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Muestra la imagen actual del funcionario si existe -->
        @if(isset($funcionario->imagen))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $funcionario->imagen) }}" width="150" alt="Imagen de perfil">
            </div>
        @endif

        <!-- Campo de entrada para el celular -->
        <div class="form-group mb-2 mb20">
            <label for="celular" class="form-label">{{ __('Celular') }}</label>
            <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror"
            value="{{ old('celular', $funcionario?->celular) }}" id="celular" placeholder="Celular">
            {!! $errors->first('celular', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de entrada para el estado -->
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" class="form-control @error('estado') is-invalid @enderror" id="estado">
                <option value="activo" {{ old('estado', $funcionario?->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $funcionario?->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>

            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="rol_personal" class="form-label">{{ __('Rol') }}</label>
            <select name="rol_personal" class="form-control @error('rol_personal') is-invalid @enderror" id="rol_personal">
                <option value="">Selecciona un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('rol_personal', $funcionario?->rol_personal) == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('rol_personal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <!-- Campo de entrada para la fecha de creación -->
        <div class="form-group mb-2 mb20">
            <label for="fecha_creacion" class="form-label">{{ __('Fecha Creación') }}</label>
            <input type="date" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror"
            value="{{ old('fecha_creacion', $funcionario?->fecha_creacion) }}" id="fecha_creacion"
            placeholder="Selecciona una fecha">
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <!-- Botón para enviar el formulario -->
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
