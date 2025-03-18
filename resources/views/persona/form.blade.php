<div class="container mx-auto mt-4 max-w-lg">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ __('Registro de Persona') }}</h4>
        </div>
        <div class="float-right">
            <a class="btn btn-primary btn-sm" href="{{ route('dashboard') }}"> {{ __('Back') }}</a>
        </div>

        <div class="mt-4">
            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre_persona" class="font-semibold text-gray-700">{{ __('Nombre') }}</label>
                <input type="text" name="nombre_persona" id="nombre_persona" placeholder="Ingrese el nombre"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('nombre_persona', $persona?->nombre_persona) }}">
                {!! $errors->first('nombre_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Apellido -->
            <div class="mb-4">
                <label for="apellido_persona" class="font-semibold text-gray-700">{{ __('Apellido') }}</label>
                <input type="text" name="apellido_persona" id="apellido_persona" placeholder="Ingrese el apellido"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('apellido_persona', $persona?->apellido_persona) }}">
                {!! $errors->first('apellido_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email_persona" class="font-semibold text-gray-700">{{ __('Correo Electrónico') }}</label>
                <input type="email" name="email_persona" id="email_persona" placeholder="Ingrese el correo electrónico"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('email_persona', $persona?->email_persona) }}">
                {!! $errors->first('email_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="telefono_persona" class="font-semibold text-gray-700">{{ __('Teléfono') }}</label>
                <input type="text" name="telefono_persona" id="telefono_persona" placeholder="Ingrese el teléfono"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('telefono_persona', $persona?->telefono_persona) }}">
                {!! $errors->first('telefono_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- CI -->
            <div class="mb-4">
                <label for="ci_persona" class="font-semibold text-gray-700">{{ __('Cédula de Identidad') }}</label>
                <input type="text" name="ci_persona" id="ci_persona" placeholder="Ingrese el CI"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('ci_persona', $persona?->ci_persona) }}">
                {!! $errors->first('ci_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="direccion_persona" class="font-semibold text-gray-700">{{ __('Dirección') }}</label>
                <input type="text" name="direccion_persona" id="direccion_persona" placeholder="Ingrese la dirección"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('direccion_persona', $persona?->direccion_persona) }}">
                {!! $errors->first('direccion_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-4">
                <label for="fecha_nacimiento_persona" class="font-semibold text-gray-700">{{ __('Fecha de Nacimiento') }}</label>
                <input type="date" name="fecha_nacimiento_persona" id="fecha_nacimiento_persona"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('fecha_nacimiento_persona', $persona?->fecha_nacimiento_persona) }}">
                {!! $errors->first('fecha_nacimiento_persona', '<div class="text-red-500 text-sm mt-1"><strong>:message</strong></div>') !!}
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    {{ __('Guardar Persona') }}
                </button>
            </div>
        </div>
    </div>
</div>
