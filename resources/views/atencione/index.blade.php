@extends('layouts.app')

@section('template_title')
    Atenciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Atenciones') }}
                            </span>

                             <div class="float-right">
                                <a href="#" id="cargarAtencioneCreate" class="btn btn-primary btn-round">
                                    <i class="now-ui-icons users_single-02"></i>
                                    Crear una nueva atencion
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

									<th >Solicitud Id</th>
									<th >Funcionarios Soportes Id</th>
									<th >Descripcion</th>
									<th >Estado</th>
									<th >Fecha Inicio</th>
									<th >Fecha Fin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atenciones as $atencione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $atencione->solicitud_id }}</td>
										<td >{{ $atencione->funcionario_id }}</td>
										<td >{{ $atencione->descripcion }}</td>
										<td >{{ $atencione->estado }}</td>
										<td >{{ $atencione->fecha_inicio }}</td>
										<td >{{ $atencione->fecha_fin }}</td>

                                            <td>
                                                <form action="{{ route('atenciones.destroy', $atencione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="#" id="cargarAtencioneShow"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="#" id="cargarAtencioneEdit"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $atenciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>


    <!-- Scripts de redireccion a create -->
    <script>
        $(document).ready(function(){
          $('#cargarAtencioneCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('atencione.create') }}",
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

<!-- Scripts de redireccion a show -->
<script>
    $(document).ready(function(){
      $('#cargarAtencioneShow').on('click', function(e) {
        e.preventDefault(); // Evita que el enlace navegue
        $.ajax({
          url: "{{ route('atenciones.show', $atencione->id) }}",
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

<!-- Scripts de redireccion a edit -->
<script>
    $(document).ready(function(){
      $('#cargarAtencioneEdit').on('click', function(e) {
        e.preventDefault(); // Evita que el enlace navegue
        $.ajax({
          url: "{{ route('atenciones.edit', $atencione->id) }}",
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
