@extends('layouts.app')

@section('template_title')
    Funcionarios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Funcionarios') }}
                            </span>

                             <div class="float-right">
                                <div class="float-right">
                                    <a href="#" id="cargarFuncionarioCreate" class="btn btn-primary btn-round">
                                      <i class="now-ui-icons users_single-02"></i>
                                      Crear un nuevo Funcionario
                                    </a>
                                  </div>
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
                                        <th>Username</th>
                                        <th>Email Inst</th>
                                        <th>Cargo</th>
                                        <th>Oficina</th>
                                        <th>Celular</th>
                                        <th>Estado</th>
                                        <th>Rol Personal</th>
                                        <th>Fecha Creacion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($funcionarios as $funcionario)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <!-- Mostrar el nombre en base al ID -->
                                        <td>{{ $funcionario->username }}</td>
                                        <td>{{ $funcionario->email_inst }}</td>
                                        <td>{{ $funcionario->cargo }}</td>
                                        <td>{{ $funcionario->oficina }}</td>
                                        <td>{{ $funcionario->celular }}</td>
                                        <td>{{ $funcionario->estado }}</td>
                                        <td>{{ optional($funcionario->role)->nombre ?? 'No asignado' }}</td>
                                        <td>{{ $funcionario->fecha_creacion }}</td>

                                        <td>
                                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('funcionarios.show', $funcionario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('funcionarios.edit', $funcionario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este funcionario?')"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                {!! $funcionarios->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('#cargarFuncionarioCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('funcionarios.create') }}",
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
