@extends('layouts.app')

@section('template_title')
    Solicitudes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Solicitudes') }}
                            </span>

                             <div class="float-right">
                                <a href="#" id="cargarSolicitudeCreate" class="btn btn-primary btn-round">
                                    <i class="now-ui-icons users_single-02"></i>
                                    Crear una nueva solicitud de atencion
                                  </a>
                              </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Funcionario</th>
                                        <th>Equipo Id</th>
                                        <th>Descripción de la Solicitud</th>
                                        <th>Archivo</th>
                                        <th>Estado</th>
                                        <th>Fecha Creación</th>
                                        <th>Funcionario de Soporte</th>
                                        <th>Tipo de Solicitud</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudes as $index => $solicitude)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>

                                            <!-- Mostrando el nombre del funcionario en lugar del ID -->
                                            <td>{{ $solicitude->funcionario?->username ?? 'No asignado' }}</td>

                                            <td>{{ $solicitude->equipo_id ?? 'N/A' }}</td>
                                            <td>{{ $solicitude->descripcion_solicitud }}</td>

                                            <!-- Si hay archivo, mostrar enlace de descarga -->
                                            <td>
                                                @if ($solicitude->archivo)
                                                    <a href="{{ asset('storage/' . $solicitude->archivo) }}" target="_blank">Ver archivo</a>
                                                @else
                                                    No adjunto
                                                @endif
                                            </td>

                                            <td>{{ ucfirst($solicitude->estado) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($solicitude->fecha_creacion)->format('d/m/Y') }}</td>

                                            <!-- Mostrando el nombre del funcionario soporte en lugar del ID -->
                                            <td>{{ $solicitude->funcionarioSoporte?->username ?? 'No asignado' }}</td>
                                            <td>{{ $solicitude?->tipo_solicitud ?? 'No asignado' }}</td>

                                            <td>
                                                <form action="{{ route('solicitudes.destroy', $solicitude->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('solicitudes.show', $solicitude->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('solicitudes.edit', $solicitude->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $solicitudes->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('#cargarSolicitudeCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('solicitude.create') }}",
              method: 'GET',
              success: function(data) {
                $('#contenido').html(data); // Inyecta el contenido en el contenedor
              },
              error: function() {
                alert('Error al cargar el contenido.');
              }
            });
          });
        });
      </script>

@endsection
