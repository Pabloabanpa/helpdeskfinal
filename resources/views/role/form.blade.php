<div class="container mx-auto mt-4 max-w-lg">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ __('Registro de Rol') }}</h4>
        </div>

        <div class="mt-4">
            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="nombre" class="font-semibold text-gray-700">{{ __('Nombre del Rol') }}</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del rol"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('nombre', $role?->nombre) }}">
                {!! $errors->first('nombre', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Campo Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="font-semibold text-gray-700">{{ __('Descripción del Rol') }}</label>
                <textarea name="descripcion" id="descripcion" rows="3" placeholder="Ingrese la descripción..."
                          class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">{{ old('descripcion', $role?->descripcion) }}</textarea>
                {!! $errors->first('descripcion', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    {{ __('Guardar Rol') }}
                </button>
            </div>
        </div>
    </div>
</div>
