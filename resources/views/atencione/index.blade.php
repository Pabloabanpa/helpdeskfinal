@extends('layouts.app')

@section('template_title')
    Atenciones
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Encabezado -->
        <div class="flex justify-between items-center bg-gradient-to-r from-orange-700 to-red-500 p-4 rounded-md text-white shadow-md">
            <h4 class="text-lg font-semibold tracking-wide">{{ __('Atenciones') }}</h4>
            <a href="#" class="cargarAtencioneCreate bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                <i class="fa fa-plus"></i> Nueva Atención
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4 shadow-sm">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de Atenciones -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-white">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm tracking-wide">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Solicitud</th>
                        <th class="p-3">Funcionario</th>
                        <th class="p-3">Descripción</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Fecha Inicio</th>
                        <th class="p-3">Fecha Fin</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($atenciones as $index => $atencione)
                        <tr class="border-b hover:bg-gray-100 transition duration-200">
                            <td class="p-3 text-center">{{ $index + 1 }}</td>
                            <td class="p-3 text-center">{{ $atencione->solicitud_id }}</td>
                            <td class="p-3 text-center">{{ $atencione->funcionario_id }}</td>
                            <td class="p-3">{{ $atencione->descripcion }}</td>
                            <td class="p-3 text-center font-semibold">{{ ucfirst($atencione->estado) }}</td>
                            <td class="p-3 text-center">{{ \Carbon\Carbon::parse($atencione->fecha_inicio)->format('d/m/Y') }}</td>
                            <td class="p-3 text-center">{{ \Carbon\Carbon::parse($atencione->fecha_fin)->format('d/m/Y') }}</td>
                            <td class="p-3 flex justify-center space-x-2">
                                <!-- Botón Ver -->
                                <a href="#" class="cargarAtencioneShow bg-blue-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300"
                                   data-id="{{ $atencione->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <!-- Botón Editar -->
                                <a href="#" class="cargarAtencioneEdit bg-yellow-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"
                                   data-id="{{ $atencione->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('atenciones.destroy', $atencione->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="event.preventDefault(); confirm('¿Eliminar esta atención?') ? this.closest('form').submit() : false;">
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
            {!! $atenciones->withQueryString()->links() !!}
        </div>
    </div>
</div>

<!-- Scripts AJAX -->
<script>
    $(document).ready(function(){
        // Crear Atención
        $(document).on('click', '.cargarAtencioneCreate', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('atencione.create') }}",
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Editar Atención
        $(document).on('click', '.cargarAtencioneEdit', function(e) {
            e.preventDefault();

            let atencionId = $(this).data('id'); // Obtener ID de la atención

            $.ajax({
                url: `/atenciones/${atencionId}/edit`, // URL con el ID dinámico
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Ver Atención
        $(document).on('click', '.cargarAtencioneShow', function(e) {
            e.preventDefault();

            let atencionId = $(this).data('id'); // Obtener ID de la atención

            $.ajax({
                url: `/atenciones/${atencionId}`, // URL con el ID dinámico
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });
    });
</script>

@endsection
