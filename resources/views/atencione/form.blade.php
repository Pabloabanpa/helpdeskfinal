<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="float-right">
            <a class="btn btn-primary btn-sm" href="{{ route('dashboard') }}"> {{ __('Back') }}</a>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="solicitud_id" class="form-label">{{ __('Solicitud Id') }}</label>
            <select name="solicitud_id" id="solicitud_id" class="form-control @error('solicitud_id') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un ID de Solicitud</option>
                @foreach ($solicitude as $solicitud)
                    <option value="{{ $solicitud->id }}"
                        {{ old('solicitud_id', $atencione?->solicitud_id) == $solicitud->id ? 'selected' : '' }}>
                        {{ $solicitud->id }}
                        {{ $solicitud->descripcion_solicitud }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('solicitud_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <!-- Selección de Funcionario de Soporte -->
        <div class="form-group mb-2 mb20">
            <label for="funcionarios_soportes_id" class="form-label">{{ __('Funcionario de Soporte') }}</label>
            <select name="funcionarios_soportes_id" id="funcionarios_soportes_id" class="form-control @error('funcionarios_soportes_id') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un funcionario de soporte</option>
                @foreach ($funcionariosSoporte as $funcionario)
                    <option value="{{ $funcionario->id }}"
                        {{ old('funcionarios_soportes_id', $atencione?->funcionarios_soportes_id) == $atencione->id ? 'selected' : '' }}>
                        {{ $funcionario->username ?? 'Sin Username' }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('funcionarios_soportes_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $atencione?->descripcion) }}" id="descripcion" placeholder="Descripcion de la Atencion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                <option value="en espera" {{ old('estado', $atencione?->estado) == 'en espera' ? 'selected' : '' }}>En espera</option>
                <option value="en proceso" {{ old('estado', $atencione?->estado) == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="finalizada" {{ old('estado', $atencione?->estado) == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
                <option value="cancelada" {{ old('estado', $atencione?->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">{{ __('Fecha Inicio') }}</label>
            <input type="date" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio', $atencione?->fecha_inicio) }}" id="fecha_inicio">
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_fin" class="form-label">{{ __('Fecha Fin') }}</label>
            <input type="date" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin', $atencione?->fecha_fin) }}" id="fecha_fin">
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>


