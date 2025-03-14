@extends('layouts.app')

@section('template_title')
    Roles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Roles') }}
                            </span>

                             <div class="float-right">
                                <a href="#" id="cargarRoleCreate" class="btn btn-primary btn-round">
                                    <i class="now-ui-icons users_single-02"></i>
                                    Crear un nuevo rol
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
									<th >Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $role->nombre }}</td>
										<td >{{ $role->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="#" id="cargarRoleShow"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success " href="#" id="cargarRoleEdit"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $roles->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('#cargarRoleCreate').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('role.create') }}",
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
          $('#cargarRoleShow').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('role.show', $role->id) }}",
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
          $('#cargarRoleEdit').on('click', function(e) {
            e.preventDefault(); // Evita que el enlace navegue
            $.ajax({
              url: "{{ route('role.edit', $role->id) }}",
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
