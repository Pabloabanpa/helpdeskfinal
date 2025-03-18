
<div class="container mx-auto mt-4 max-w-lg">

    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ __('Registro de Oficina') }}</h4>
        </div>
        
        <div class="float-right">
            <a class="btn btn-primary btn-sm" href="dashboard"> {{ __('Back') }}</a>
        </div>

        <div class="mt-4">
            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="nombre" class="font-semibold text-gray-700">{{ __('Nombre de la Oficina') }}</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre de la oficina"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('nombre', $oficina?->nombre) }}">
                {!! $errors->first('nombre', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Campo Dirección -->
            <div class="mb-4">
                <label for="direccion" class="font-semibold text-gray-700">{{ __('Dirección') }}</label>
                <input type="text" name="direccion" id="direccion" placeholder="Ingrese la dirección"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('direccion', $oficina?->direccion) }}">
                {!! $errors->first('direccion', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Campo Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="font-semibold text-gray-700">{{ __('Teléfono') }}</label>
                <input type="text" name="telefono" id="telefono" placeholder="Ingrese el número de teléfono"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('telefono', $oficina?->telefono) }}">
                {!! $errors->first('telefono', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Campo Encargado -->
            <div class="mb-4">
                <label for="encargado" class="font-semibold text-gray-700">{{ __('Encargado') }}</label>
                <input type="text" name="encargado" id="encargado" placeholder="Ingrese el nombre del encargado"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('encargado', $oficina?->encargado) }}">
                {!! $errors->first('encargado', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    {{ __('Guardar Oficina') }}
                </button>
            </div>
        </div>
    </div>
</div>
