@extends('layouts.app')

@section('template_title')
    Personas
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Encabezado -->
        <div class="flex justify-between items-center bg-gradient-to-r from-[#2563eb] to-[#38bdf8] p-4 rounded-md text-white shadow-md">
            <h4 class="text-lg font-semibold tracking-wide">{{ __('Personas') }}</h4>
            <a href="#" id="cargarPersonasCreate" class="bg-[#16a34a] text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                <i class="fa fa-user-plus"></i> Nueva Persona
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4 shadow-sm">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de Personas -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-white">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm tracking-wide">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Apellido</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Teléfono</th>
                        <th class="p-3">CI</th>
                        <th class="p-3">Dirección</th>
                        <th class="p-3">Fecha de Nacimiento</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($personas as $index => $persona)
                        <tr class="border-b hover:bg-gray-100 transition duration-200">
                            <td class="p-3 text-center">{{ $index + 1 }}</td>
                            <td class="p-3">{{ $persona->nombre_persona }}</td>
                            <td class="p-3">{{ $persona->apellido_persona }}</td>
                            <td class="p-3">{{ $persona->email_persona }}</td>
                            <td class="p-3 text-center">{{ $persona->telefono_persona }}</td>
                            <td class="p-3 text-center">{{ $persona->ci_persona }}</td>
                            <td class="p-3">{{ $persona->direccion_persona }}</td>
                            <td class="p-3 text-center">{{ $persona->fecha_nacimiento_persona }}</td>
                            <td class="p-3 flex justify-center space-x-2">
                                <!-- Ver persona -->
                                <a href="#" class="cargarPersonaShow bg-gray-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300"
                                   data-id="{{ $persona->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <!-- Editar persona -->
                                <a href="#" class="cargarPersonaEdit bg-[#eab308] text-white px-3 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition duration-300"
                                   data-id="{{ $persona->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- Eliminar persona -->
                                <form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-[#dc2626] text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="event.preventDefault(); confirm('¿Eliminar esta persona?') ? this.closest('form').submit() : false;">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="flex justify-center mt-4">
            {!! $personas->withQueryString()->links() !!}
        </div>
    </div>
</div>

<!-- Scripts AJAX -->
<script>
    $(document).ready(function(){
        // Cargar formulario de CREACIÓN en el contenedor general
        $(document).on('click', '#cargarPersonasCreate', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('persona.create') }}",
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el formulario de creación.');
                }
            });
        });

        // Cargar formulario de EDICIÓN en el contenedor general
        $(document).on('click', '.cargarPersonaEdit', function(e) {
            e.preventDefault();

            let personaId = $(this).data('id'); // Obtener ID
            $.ajax({
                url: `/personas/${personaId}/edit`, // Ruta dinámica
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el formulario de edición.');
                }
            });
        });

        // Cargar vista de DETALLE en el contenedor general
        $(document).on('click', '.cargarPersonaShow', function(e) {
            e.preventDefault();

            let personaId = $(this).data('id'); // Obtener ID
            $.ajax({
                url: `/personas/${personaId}`, // Ruta dinámica
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar los detalles de la persona.');
                }
            });
        });
    });
</script>

@endsection
