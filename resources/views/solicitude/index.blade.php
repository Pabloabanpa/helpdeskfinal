@extends('layouts.app')

@section('template_title')
    Solicitudes
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Encabezado -->
        <div class="flex justify-between items-center bg-gradient-to-r from-orange-700 to-red-500 p-4 rounded-md text-white shadow-md">
            <h4 class="text-lg font-semibold tracking-wide">{{ __('Solicitudes de Atención') }}</h4>
            <a href="#" class="cargarSolicitudeCreate bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                <i class="fa fa-plus"></i> Nueva Solicitud
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4 shadow-sm">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de solicitudes -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-white">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm tracking-wide">
                    <tr>
                        <th class="p-3"># Solicitud</th>
                        <th class="p-3">Funcionario</th>
                        <th class="p-3">Equipo</th>
                        <th class="p-3">Descripción</th>
                        <th class="p-3">Archivo</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Fecha</th>
                        <th class="p-3">Tipo</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($solicitudes as $index => $solicitude)
                        <tr class="border-b hover:bg-gray-100 transition duration-200">
                            <td class="p-3 text-gray-600">{{ $solicitude->id }}</td>
                            <td class="p-3 text-center font-semibold">{{ $solicitude->funcionario?->username ?? 'No asignado' }}</td>
                            <td class="p-3 text-center">{{ $solicitude->equipo_id ?? 'N/A' }}</td>
                            <td class="p-3 text-gray-600">{{ $solicitude->descripcion_solicitud }}</td>
                            <td class="p-3 text-center">
                                @if ($solicitude->archivo)
                                    <a href="{{ asset('storage/' . $solicitude->archivo) }}" target="_blank" class="text-blue-500 underline hover:text-blue-700">
                                        Ver Archivo
                                    </a>
                                @else
                                    <span class="text-gray-500">No adjunto</span>
                                @endif
                            </td>
                            <td class="p-3 text-center">
                                <span class="px-3 py-1 rounded-full text-white text-xs font-semibold
                                    {{ $solicitude->estado == 'en espera' ? 'bg-yellow-500' : '' }}
                                    {{ $solicitude->estado == 'en proceso' ? 'bg-blue-500' : '' }}
                                    {{ $solicitude->estado == 'finalizada' ? 'bg-green-500' : '' }}
                                    {{ $solicitude->estado == 'cancelada' ? 'bg-red-500' : '' }}">
                                    {{ ucfirst($solicitude->estado) }}
                                </span>
                            </td>
                            <td class="p-3 text-center">{{ \Carbon\Carbon::parse($solicitude->fecha_creacion)->format('d/m/Y') }}</td>
                            <td class="p-3 text-center">{{ $solicitude?->tipo_solicitud ?? 'No asignado' }}</td>
                            <td class="p-3 flex justify-center space-x-2">
                                <a href="#" class="cargarSolicitudeShow bg-gray-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300"
                                   data-id="{{ $solicitude->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="cargarSolicitudeEdit bg-yellow-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"
                                   data-id="{{ $solicitude->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('solicitudes.destroy', $solicitude->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="event.preventDefault(); confirm('¿Eliminar esta solicitud?') ? this.closest('form').submit() : false;">
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
            {!! $solicitudes->withQueryString()->links() !!}
        </div>
    </div>
</div>

<!-- Scripts AJAX -->
<script>
    $(document).ready(function(){
        // Crear Solicitud
        $(document).on('click', '.cargarSolicitudeCreate', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('solicitude.create') }}",
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Ver Solicitud
        $(document).on('click', '.cargarSolicitudeShow', function(e) {
            e.preventDefault();

            let solicitudId = $(this).data('id'); // Obtener ID de la solicitud

            $.ajax({
                url: `/solicitudes/${solicitudId}`, // URL con el ID dinámico
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

$(document).on('click', '.cargarSolicitudeEdit', function(e) {
    e.preventDefault();
    let solicitudId = $(this).data('id'); // Obtener ID dinámico

    $.ajax({
        url: `/solicitudes/${solicitudId}/edit`, // URL dinámica
        method: 'GET',
        success: function(data) {
            $('#contenido').html(data);
        },
        error: function(xhr) {
            alert(`Error ${xhr.status}: No se pudo cargar la solicitud.`);
        }
    });
});


    });
</script>

@endsection
