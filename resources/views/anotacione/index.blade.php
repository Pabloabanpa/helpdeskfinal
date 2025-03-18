@extends('layouts.app')

@section('template_title')
    Anotaciones
@endsection

@section('content')
<div class="container mx-auto mt-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Encabezado con título y botón de crear -->
        <div class="flex justify-between items-center bg-gradient-to-r from-purple-500 to-indigo-500 p-4 rounded-md text-white shadow-md">
            <h4 class="text-xl font-semibold">{{ __('Anotaciones') }}</h4>
            <a href="{{ route('anotaciones.create') }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                <i class="now-ui-icons ui-1_simple-add"></i> Nueva Anotación
            </a>
        </div>

        <!-- Mensaje de éxito -->
        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded-lg mt-4">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- Tabla de anotaciones -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md">
                <thead class="bg-purple-500 text-white">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Atención</th>
                        <th class="p-3">Funcionario</th>
                        <th class="p-3">Descripción</th>
                        <th class="p-3">Material Usado</th>
                        <th class="p-3">Fecha</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anotaciones as $index => $anotacione)
                        <tr class="border-b hover:bg-gray-100 transition duration-300">
                            <td class="p-3 text-center">{{ $index + 1 }}</td>
                            <td class="p-3 text-center">{{ $anotacione->atencion_id }}</td>
                            <td class="p-3 text-center">{{ $anotacione->funcionarios_soportes_id }}</td>
                            <td class="p-3">{{ $anotacione->descripcion }}</td>
                            <td class="p-3">{{ $anotacione->material_usado }}</td>
                            <td class="p-3 text-center">{{ \Carbon\Carbon::parse($anotacione->fecha_creacion)->format('d/m/Y') }}</td>

                            <!-- Botones de acción -->
                            <td class="p-3 text-center">
                                <form action="{{ route('anotaciones.destroy', $anotacione->id) }}" method="POST">
                                    <a href="{{ route('anotaciones.show', $anotacione->id) }}" class="bg-blue-500 text-white px-3 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('anotaciones.edit', $anotacione->id) }}" class="bg-yellow-500 text-white px-3 py-2 rounded-md shadow-md hover:bg-yellow-600 transition duration-300">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-md shadow-md hover:bg-red-600 transition duration-300"
                                        onclick="return confirm('¿Seguro que deseas eliminar esta anotación?')">
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
            {!! $anotaciones->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
