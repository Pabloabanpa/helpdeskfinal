<div class="container mx-auto mt-4 max-w-lg">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ __('Registro de Anotación') }}</h4>
        </div>

        <div class="mt-4">
            <!-- Selección de Atención -->
            <div class="mb-4">
                <label for="atencion_id" class="font-semibold text-gray-700">{{ __('ID de Atención') }}</label>
                <select name="atencion_id" id="atencion_id" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="" disabled selected>Seleccione un ID de Atención</option>
                    @foreach ($atencione as $atencion)
                        <option value="{{ $atencion->id }}" {{ old('atencion_id', $anotacione?->atencion_id) == $atencion->id ? 'selected' : '' }}>
                            {{ $atencion->descripcion ?? 'Sin descripción' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Funcionario de Soporte -->
            <div class="mb-4">
                <label for="funcionarios_soportes_id" class="font-semibold text-gray-700">{{ __('Funcionario de Soporte') }}</label>
                <select name="funcionarios_soportes_id" id="funcionarios_soportes_id" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="" disabled selected>Seleccione un funcionario de soporte</option>
                    @foreach ($funcionariosSoporte as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ old('funcionarios_soportes_id', $anotacione?->funcionarios_soportes_id) == $funcionario->id ? 'selected' : '' }}>
                            {{ $funcionario->username ?? 'Sin Username' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo de Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="font-semibold text-gray-700">{{ __('Descripción') }}</label>
                <textarea name="descripcion" id="descripcion" rows="3" placeholder="Ingrese la descripción..."
                          class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">{{ old('descripcion', $anotacione?->descripcion) }}</textarea>
            </div>

            <!-- Campo de Material Usado -->
            <div class="mb-4">
                <label for="material_usado" class="font-semibold text-gray-700">{{ __('Material Usado') }}</label>
                <input type="text" name="material_usado" id="material_usado" placeholder="Describa el material usado"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('material_usado', $anotacione?->material_usado) }}">
            </div>

            <!-- Campo de Fecha de Creación -->
            <div class="mb-4">
                <label for="fecha_creacion" class="font-semibold text-gray-700">{{ __('Fecha de la Anotación') }}</label>
                <input type="date" name="fecha_creacion" id="fecha_creacion"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('fecha_creacion', $anotacione?->fecha_creacion) }}">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    {{ __('Guardar Anotación') }}
                </button>
            </div>
        </div>
    </div>
</div>
