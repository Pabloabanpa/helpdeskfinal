<div class="container mx-auto mt-4 max-w-2xl">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="text-center text-white bg-blue-500 p-4 rounded-md">
            <h4 class="text-xl font-semibold">{{ __('Registro de Funcionario') }}</h4>
        </div>

        <div class="mt-4">
            <!-- Selección de Persona -->
            <div class="mb-4">
                <label for="persona" class="font-semibold text-gray-700">{{ __('Persona') }}</label>
                <select name="persona" id="persona" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="">Selecciona una persona</option>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}" {{ old('persona', $funcionario?->persona) == $persona->id ? 'selected' : '' }}>
                            {{ $persona->nombre_persona }} {{ $persona->apellido_persona }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="font-semibold text-gray-700">{{ __('Nombre de Usuario') }}</label>
                <input type="text" name="username" id="username" placeholder="Ingrese el nombre de usuario"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('username', $funcionario?->username) }}">
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="font-semibold text-gray-700">{{ __('Contraseña') }}</label>
                <input type="password" name="password" id="password" placeholder="Ingrese una contraseña"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <!-- Email Institucional -->
            <div class="mb-4">
                <label for="email_inst" class="font-semibold text-gray-700">{{ __('Correo Institucional') }}</label>
                <input type="email" name="email_inst" id="email_inst" placeholder="Ingrese el email institucional"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('email_inst', $funcionario?->email_inst) }}">
            </div>

            <!-- Cargo -->
            <div class="mb-4">
                <label for="cargo" class="font-semibold text-gray-700">{{ __('Cargo') }}</label>
                <input type="text" name="cargo" id="cargo" placeholder="Ingrese el cargo"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('cargo', $funcionario?->cargo) }}">
            </div>

            <!-- Selección de Oficina -->
            <div class="mb-4">
                <label for="oficina" class="font-semibold text-gray-700">{{ __('Oficina') }}</label>
                <select name="oficina" id="oficina" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="">Selecciona una oficina</option>
                    @foreach ($oficinas as $oficina)
                        <option value="{{ $oficina->id }}" {{ old('oficina', $funcionario?->oficina) == $oficina->id ? 'selected' : '' }}>
                            {{ $oficina->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Imagen de Perfil -->
            <div class="mb-4">
                <label class="font-semibold text-gray-700">{{ __('Imagen de Perfil') }}</label>
                <div class="w-full border-2 border-dashed border-blue-500 rounded-lg p-6 text-center bg-gray-100 hover:bg-gray-200 transition duration-300 cursor-pointer">
                    <input type="file" name="imagen" id="imagen" accept="image/*" class="hidden">
                    <label for="imagen" class="text-blue-600 font-medium cursor-pointer">
                        Click para subir una imagen
                    </label>
                </div>
                <!-- Previsualización de la imagen -->
                @if(isset($funcionario->imagen))
                    <div class="mt-4 text-center">
                        <img src="{{ asset('storage/' . $funcionario->imagen) }}" width="150" class="rounded-lg shadow-md">
                    </div>
                @endif
            </div>

            <!-- Celular -->
            <div class="mb-4">
                <label for="celular" class="font-semibold text-gray-700">{{ __('Celular') }}</label>
                <input type="text" name="celular" id="celular" placeholder="Ingrese el número de celular"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('celular', $funcionario?->celular) }}">
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="estado" class="font-semibold text-gray-700">{{ __('Estado') }}</label>
                <select name="estado" id="estado" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="activo" {{ old('estado', $funcionario?->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('estado', $funcionario?->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <!-- Rol -->
            <div class="mb-4">
                <label for="rol_personal" class="font-semibold text-gray-700">{{ __('Rol') }}</label>
                <select name="rol_personal" id="rol_personal" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200">
                    <option value="">Selecciona un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('rol_personal', $funcionario?->rol_personal) == $role->id ? 'selected' : '' }}>
                            {{ $role->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha de Creación -->
            <div class="mb-4">
                <label for="fecha_creacion" class="font-semibold text-gray-700">{{ __('Fecha de Creación') }}</label>
                <input type="date" name="fecha_creacion" id="fecha_creacion"
                       class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-200"
                       value="{{ old('fecha_creacion', $funcionario?->fecha_creacion) }}">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    {{ __('Guardar Funcionario') }}
                </button>
            </div>
        </div>
    </div>
</div>
