@extends('layouts.app')

@section('template_title')
    Roles
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Encabezado -->
        <div class="flex justify-between items-center bg-gradient-to-r from-[#2980b9] to-[#6dd5fa] p-4 rounded-md text-white shadow-md">
            <h4 class="text-lg font-semibold tracking-wide">{{ __('Roles') }}</h4>
            <a href="#" id="cargarRoleCreate" class="bg-[#27ae60] text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                <i class="fa fa-user-plus"></i> Nuevo Rol
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4 shadow-sm">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de Roles -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-white">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm tracking-wide">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nombre</th>
                        <th class="p-3">Descripción</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($roles as $index => $role)
                        <tr class="border-b hover:bg-gray-100 transition duration-200">
                            <td class="p-3 text-center">{{ $index + 1 }}</td>
                            <td class="p-3 font-semibold">{{ $role->nombre }}</td>
                            <td class="p-3 text-gray-600">{{ $role->descripcion }}</td>
                            <td class="p-3 flex justify-center space-x-2">
                                <a href="#" class="cargarRoleShow bg-gray-600 text-white px-3 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300" data-id="{{ $role->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="cargarRoleEdit bg-[#f39c12] text-white px-3 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300" data-id="{{ $role->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-[#e74c3c] text-white px-3 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300"
                                        onclick="event.preventDefault(); confirm('¿Eliminar este rol?') ? this.closest('form').submit() : false;">
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
            {!! $roles->withQueryString()->links() !!}
        </div>
    </div>
</div>

<!-- Scripts AJAX -->
<script>
    $(document).ready(function(){
        // Cargar creación de roles
        $('#cargarRoleCreate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('role.create') }}",
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Cargar vista de un rol específico
        $(document).on('click', '.cargarRoleShow', function(e) {
            e.preventDefault();
            let roleId = $(this).data('id');
            $.ajax({
                url: `/roles/${roleId}`,
                method: 'GET',
                success: function(data) {
                    $('#contenido').html(data);
                },
                error: function() {
                    alert('Error al cargar el contenido.');
                }
            });
        });

        // Cargar edición de un rol específico
        $(document).on('click', '.cargarRoleEdit', function(e) {
            e.preventDefault();
            let roleId = $(this).data('id');
            $.ajax({
                url: `/roles/${roleId}/edit`,
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
