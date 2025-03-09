@extends('layouts.app')

@section('template_title')
    Oficinas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Oficinas') }}
                            </span>

                             <div class="float-right">
                                <a href="#" id="cargarOficinaCreate" class="btn btn-primary btn-round">
                                    <i class="now-ui-icons users_single-02"></i>
                                    Crear un nueva oficina
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

									<th >Nombre</th>
									<th >Direccion</th>
									<th >Telefono</th>
									<th >Encargado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($oficinas as $oficina)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $oficina->nombre }}</td>
										<td >{{ $oficina->direccion }}</td>
										<td >{{ $oficina->telefono }}</td>
										<td >{{ $oficina->encargado }}</td>

                                            <td>
                                                <form action="{{ route('oficinas.destroy', $oficina->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('oficinas.show', $oficina->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('oficinas.edit', $oficina->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $oficinas->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('#cargarOficinaCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('oficina.create') }}",
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
