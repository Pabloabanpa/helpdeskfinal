<div class="container mx-auto mt-4 max-w-2xl">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ __('Registro de Atención') }}</h4>
        </div>

        <div class="mt-4">
            <!-- Selección de Solicitud -->
            <div class="mb-4">
                <label for="solicitud_id" class="font-semibold text-gray-700">{{ __('Solicitud ID') }}</label>
                <select name="solicitud_id" id="solicitud_id" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="" disabled selected>Seleccione un ID de Solicitud</option>
                    @foreach ($solicitude as $solicitud)
                        <option value="{{ $solicitud->id }}"
                            {{ old('solicitud_id', $atencione?->solicitud_id) == $solicitud->id ? 'selected' : '' }}>
                            #{{ $solicitud->id }} - {{ $solicitud->descripcion_solicitud }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Funcionario -->
            <div class="mb-4">
                <label for="funcionario_id" class="font-semibold text-gray-700">{{ __('Funcionario') }}</label>
                <select name="funcionario_id" id="funcionario_id" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="" disabled selected>Seleccione un funcionario</option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}"
                            {{ old('funcionario_id', $atencione?->funcionario_id) == $funcionario->id ? 'selected' : '' }}>
                            {{ $funcionario?->username ?? 'Sin Username' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="font-semibold text-gray-700">{{ __('Descripción de la Atención') }}</label>
                <textarea name="descripcion" id="descripcion" rows="3" placeholder="Ingrese la descripción..."
                          class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">{{ old('descripcion', $atencione?->descripcion) }}</textarea>
            </div>

            <!-- Campo Estado -->
            <div class="mb-4">
                <label for="estado" class="font-semibold text-gray-700">{{ __('Estado de la Atención') }}</label>
                <select name="estado" id="estado" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="en espera" {{ old('estado', $atencione?->estado) == 'en espera' ? 'selected' : '' }}>En espera</option>
                    <option value="en proceso" {{ old('estado', $atencione?->estado) == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="finalizada" {{ old('estado', $atencione?->estado) == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
                    <option value="cancelada" {{ old('estado', $atencione?->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <!-- Campo Fecha de Inicio -->
            <div class="mb-4">
                <label for="fecha_inicio" class="font-semibold text-gray-700">{{ __('Fecha de Inicio') }}</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', $atencione?->fecha_inicio) }}"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <!-- Campo Fecha de Fin -->
            <div class="mb-4">
                <label for="fecha_fin" class="font-semibold text-gray-700">{{ __('Fecha de Fin') }}</label>
                <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', $atencione?->fecha_fin) }}"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    {{ __('Guardar Atención') }}
                </button>
            </div>
        </div>
    </div>
</div>
