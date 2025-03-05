@extends('layouts.app')

@section('template_title')
    Personas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personas') }}
                            </span>
                            <div class="float-right">
                                <a href="#" id="cargarPersonasCreate" class="btn btn-primary btn-round">
                                  <i class="now-ui-icons users_single-02"></i>
                                  Crear una nueva Persona
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

									<th >Nombre Persona</th>
									<th >Apellido Persona</th>
									<th >Email Persona</th>
									<th >Telefono Persona</th>
									<th >Ci Persona</th>
									<th >Direccion Persona</th>
									<th >Fecha Nacimiento Persona</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $persona->nombre_persona }}</td>
										<td >{{ $persona->apellido_persona }}</td>
										<td >{{ $persona->email_persona }}</td>
										<td >{{ $persona->telefono_persona }}</td>
										<td >{{ $persona->ci_persona }}</td>
										<td >{{ $persona->direccion_persona }}</td>
										<td >{{ $persona->fecha_nacimiento_persona }}</td>

                                            <td>
                                                <form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('personas.show', $persona->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('personas.edit', $persona->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $personas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
          $('#cargarPersonasCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('persona.create') }}",
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
