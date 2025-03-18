@extends('layouts.app')

@section('template_title')
    Oficinas
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Encabezado -->
        <div class="flex justify-between items-center bg-gradient-to-r from-[#1e40af] to-[#60a5fa] p-4 rounded-md text-white shadow-md">
            <h4 class="text-lg font-semibold tracking-wide">{{ __('Oficinas') }}</h4>
            <a href="#" id="cargarOficinaCreate" class="bg-[#22c55e] text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                <i class="fa fa-plus"></i> Nueva Oficina
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4 shadow-sm">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de Oficinas -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-white">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm tracking-wide">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Dirección</th>
                        <th class="p-3">Teléfono</th>
                        <th class="p-3">Encargado</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($oficinas as $index => $oficina)
                        <tr class="border-b hover:bg-gray-100 transition duration-200">
                            <td class="p-3 text-center">{{ $index + 1 }}</td>
                            <td class="p-3">{{ $oficina->nombre }}</td>
                            <td class="p-3">{{ $oficina->direccion }}</td>
                            <td class="p-3 text-center">{{ $oficina->telefono }}</td>
                            <td class="p-3">{{ $oficina->encargado }}</td>
                            <td class="p-3 flex justify-center space-x-2">
                                <a href="#" class="cargarOficinaShow bg-gray-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300" data-id="{{ $oficina->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="cargarOficinaEdit bg-[#facc15] text-white px-3 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition duration-300" data-id="{{ $oficina->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('oficinas.destroy', $oficina->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-[#ef4444] text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="event.preventDefault(); confirm('¿Eliminar esta oficina?') ? this.closest('form').submit() : false;">
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
            {!! $oficinas->withQueryString()->links() !!}
        </div>
    </div>
</div>

<!-- Scripts AJAX -->
<script>
    $(document).ready(function(){
        // Cargar creación de oficina
        $('#cargarOficinaCreate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('oficina.create') }}",
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Cargar vista de una oficina específica
        $(document).on('click', '.cargarOficinaShow', function(e) {
            e.preventDefault();
            let oficinaId = $(this).data('id');
            $.ajax({
                url: `/oficinas/${oficinaId}`,
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Cargar edición de una oficina específica
        $(document).on('click', '.cargarOficinaEdit', function(e) {
            e.preventDefault();
            let oficinaId = $(this).data('id');
            $.ajax({
                url: `/oficinas/${oficinaId}/edit`,
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
