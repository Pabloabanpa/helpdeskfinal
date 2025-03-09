@extends('layouts.app')

@section('template_title')
    Funcionarios Soportes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Funcionarios Soportes') }}
                            </span>

                             <div class="float-right">
                                <a href="#" id="cargarFuncionarioSoporteCreate" class="btn btn-primary btn-round">
                                    <i class="now-ui-icons users_single-02"></i>
                                    Crear un nuevo Funcionario de Soporte
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

									<th >Username</th>
                                    <th >Password</th>
									<th >Rol </th>
                                    <th >Nivel de Atencion</th>
									<th >Estado</th>
									<th >Fecha Creacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($funcionariosSoportes as $funcionariosSoporte)
                                        <tr>
                                            <td>{{ ++$i }}</td>


										<td >{{ $funcionariosSoporte->username }}</td>
                                        <td >{{ $funcionariosSoporte->password }}</td>
										<td >{{ $funcionariosSoporte->rol_id }}</td>
                                        <td >{{ $funcionariosSoporte->nivel_atencion }}</td>
										<td >{{ $funcionariosSoporte->estado }}</td>
										<td >{{ $funcionariosSoporte->fecha_creacion }}</td>

                                            <td>
                                                <form action="{{ route('funcionarios-soportes.destroy', $funcionariosSoporte->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('funcionarios-soportes.show', $funcionariosSoporte->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('funcionarios-soportes.edit', $funcionariosSoporte->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $funcionariosSoportes->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('#cargarFuncionarioSoporteCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('funcionarios-soporte.create') }}",
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
