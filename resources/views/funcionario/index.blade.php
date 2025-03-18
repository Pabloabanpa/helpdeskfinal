@extends('layouts.app')

@section('template_title')
    Funcionarios
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Encabezado con título y botón de crear -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-500 to-indigo-500 p-4 rounded-md text-white shadow-md">
            <h4 class="text-xl font-semibold">{{ __('Funcionarios') }}</h4>
            <a href="#" id="cargarFuncionarioCreate" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                <i class="fa fa-user-plus"></i> Crear Funcionario
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de funcionarios -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Username</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Cargo</th>
                        <th class="p-3">Oficina</th>
                        <th class="p-3">Celular</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Rol</th>
                        <th class="p-3">Fecha Creación</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $index => $funcionario)
                        <tr class="border-b hover:bg-gray-100 transition duration-300">
                            <td class="p-3 text-center">{{ $index + 1 }}</td>
                            <td class="p-3 text-center">{{ $funcionario->username }}</td>
                            <td class="p-3 text-center">{{ $funcionario->email_inst }}</td>
                            <td class="p-3 text-center">{{ $funcionario->cargo }}</td>
                            <td class="p-3 text-center">{{ $funcionario->oficina }}</td>
                            <td class="p-3 text-center">{{ $funcionario->celular }}</td>
                            <td class="p-3 text-center">
                                <span class="px-2 py-1 rounded-md text-white text-sm
                                    {{ $funcionario->estado === 'activo' ? 'bg-green-500' : 'bg-red-500' }} ">
                                    {{ ucfirst($funcionario->estado) }}
                                </span>
                            </td>
                            <td class="p-3 text-center">{{ optional($funcionario->role)->nombre ?? 'No asignado' }}</td>
                            <td class="p-3 text-center">{{ \Carbon\Carbon::parse($funcionario->fecha_creacion)->format('d/m/Y') }}</td>

                            <!-- Botones de acción -->
                            <td class="p-3 flex justify-center space-x-2">
                                <a href="#" class="cargarFuncionarioShow bg-blue-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300" data-id="{{ $funcionario->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="cargarFuncionarioEdit bg-yellow-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300" data-id="{{ $funcionario->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-300"
                                        onclick="event.preventDefault(); confirm('¿Seguro que deseas eliminar este funcionario?') ? this.closest('form').submit() : false;">
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
            {!! $funcionarios->withQueryString()->links() !!}
        </div>
    </div>
</div>

<!-- Scripts AJAX -->
<script>
    $(document).ready(function(){
        // Cargar creación de funcionario
        $('#cargarFuncionarioCreate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('funcionarios.create') }}",
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Cargar vista de un funcionario específico
        $(document).on('click', '.cargarFuncionarioShow', function(e) {
            e.preventDefault();
            let funcionarioId = $(this).data('id');
            $.ajax({
                url: `/funcionarios/${funcionarioId}`,
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Cargar edición de un funcionario específico
        $(document).on('click', '.cargarFuncionarioEdit', function(e) {
            e.preventDefault();
            let funcionarioId = $(this).data('id');
            $.ajax({
                url: `/funcionarios/${funcionarioId}/edit`,
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
