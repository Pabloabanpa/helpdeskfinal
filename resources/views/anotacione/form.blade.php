<div class="row padding-1 p-1">
    <div class="col-md-12">

        <!-- Selección de Atención -->
        <div class="form-group mb-2 mb20">
            <label for="atencion_id" class="form-label">{{ __('ID de Atención') }}</label>
            <select name="atencion_id" id="atencion_id" class="form-control @error('atencion_id') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un ID de Atención</option>
                @foreach ($atencione as $atencion)  <!-- Se mantiene 'atencione' como variable principal -->
                    <option value="{{ $atencion->id }}"
                        {{ old('atencion_id', $anotacione?->atencion_id) == $atencion->id ? 'selected' : '' }}>
                        {{ $atencion->descripcion ?? 'Sin descripción' }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('atencion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Selección de Funcionario de Soporte -->
        <div class="form-group mb-2 mb20">
            <label for="funcionarios_soportes_id" class="form-label">{{ __('Funcionario de Soporte') }}</label>
            <select name="funcionarios_soportes_id" id="funcionarios_soportes_id" class="form-control @error('funcionarios_soportes_id') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un funcionario de soporte</option>
                @foreach ($funcionariosSoporte as $funcionario)
                    <option value="{{ $funcionario->id }}"
                        {{ old('funcionarios_soportes_id', $anotacione?->funcionarios_soportes_id) == $funcionario->id ? 'selected' : '' }}>
                        {{ $funcionario->username ?? 'Sin Username' }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('funcionarios_soportes_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <!-- Campo de Descripción -->
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                value="{{ old('descripcion', $anotacione?->descripcion) }}" id="descripcion" placeholder="Descripción">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de Material Usado -->
        <div class="form-group mb-2 mb20">
            <label for="material_usado" class="form-label">{{ __('Material Usado') }}</label>
            <input type="text" name="material_usado" class="form-control @error('material_usado') is-invalid @enderror"
                value="{{ old('material_usado', $anotacione?->material_usado) }}" id="material_usado" placeholder="Describa el material usado">
            {!! $errors->first('material_usado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Campo de Fecha de Creación -->
        <div class="form-group mb-2 mb20">
            <label for="fecha_creacion" class="form-label">{{ __('Fecha de la Anotación') }}</label>
            <input type="date" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror"
                value="{{ old('fecha_creacion', $anotacione?->fecha_creacion) }}" id="fecha_creacion">
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <!-- Botón de envío -->
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
