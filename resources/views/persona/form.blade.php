<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre_persona" class="form-label">{{ __('Nombre Persona') }}</label>
            <input type="text" name="nombre_persona" class="form-control @error('nombre_persona') is-invalid @enderror" value="{{ old('nombre_persona', $persona?->nombre_persona) }}" id="nombre_persona" placeholder="Nombre Persona">
            {!! $errors->first('nombre_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_persona" class="form-label">{{ __('Apellido Persona') }}</label>
            <input type="text" name="apellido_persona" class="form-control @error('apellido_persona') is-invalid @enderror" value="{{ old('apellido_persona', $persona?->apellido_persona) }}" id="apellido_persona" placeholder="Apellido Persona">
            {!! $errors->first('apellido_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email_persona" class="form-label">{{ __('Email Persona') }}</label>
            <input type="text" name="email_persona" class="form-control @error('email_persona') is-invalid @enderror" value="{{ old('email_persona', $persona?->email_persona) }}" id="email_persona" placeholder="Email Persona">
            {!! $errors->first('email_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono_persona" class="form-label">{{ __('Telefono Persona') }}</label>
            <input type="text" name="telefono_persona" class="form-control @error('telefono_persona') is-invalid @enderror" value="{{ old('telefono_persona', $persona?->telefono_persona) }}" id="telefono_persona" placeholder="Telefono Persona">
            {!! $errors->first('telefono_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ci_persona" class="form-label">{{ __('Ci Persona') }}</label>
            <input type="text" name="ci_persona" class="form-control @error('ci_persona') is-invalid @enderror" value="{{ old('ci_persona', $persona?->ci_persona) }}" id="ci_persona" placeholder="Ci Persona">
            {!! $errors->first('ci_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion_persona" class="form-label">{{ __('Direccion Persona') }}</label>
            <input type="text" name="direccion_persona" class="form-control @error('direccion_persona') is-invalid @enderror" value="{{ old('direccion_persona', $persona?->direccion_persona) }}" id="direccion_persona" placeholder="Direccion Persona">
            {!! $errors->first('direccion_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento_persona" class="form-label">{{ __('Fecha Nacimiento Persona') }}</label>
            <input type="date" name="fecha_nacimiento_persona" class="form-control @error('fecha_nacimiento_persona') is-invalid @enderror" value="{{ old('fecha_nacimiento_persona', $persona?->fecha_nacimiento_persona) }}" id="fecha_nacimiento_persona">
            {!! $errors->first('fecha_nacimiento_persona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
