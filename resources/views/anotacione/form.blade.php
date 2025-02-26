<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="atencion_id" class="form-label">{{ __('Atencion Id') }}</label>
            <input type="text" name="atencion_id" class="form-control @error('atencion_id') is-invalid @enderror" value="{{ old('atencion_id', $anotacione?->atencion_id) }}" id="atencion_id" placeholder="Atencion Id">
            {!! $errors->first('atencion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="funcionarios_soportes_id" class="form-label">{{ __('Funcionarios Soportes Id') }}</label>
            <input type="text" name="funcionarios_soportes_id" class="form-control @error('funcionarios_soportes_id') is-invalid @enderror" value="{{ old('funcionarios_soportes_id', $anotacione?->funcionarios_soportes_id) }}" id="funcionarios_soportes_id" placeholder="Funcionarios Soportes Id">
            {!! $errors->first('funcionarios_soportes_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $anotacione?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="material_usado" class="form-label">{{ __('Material Usado') }}</label>
            <input type="text" name="material_usado" class="form-control @error('material_usado') is-invalid @enderror" value="{{ old('material_usado', $anotacione?->material_usado) }}" id="material_usado" placeholder="Material Usado">
            {!! $errors->first('material_usado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_creacion" class="form-label">{{ __('Fecha Creacion') }}</label>
            <input type="text" name="fecha_creacion" class="form-control @error('fecha_creacion') is-invalid @enderror" value="{{ old('fecha_creacion', $anotacione?->fecha_creacion) }}" id="fecha_creacion" placeholder="Fecha Creacion">
            {!! $errors->first('fecha_creacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>