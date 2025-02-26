@extends('layouts.app')

@section('template_title')
    Anotaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Anotaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('anotaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
									<th >Atencion Id</th>
									<th >Funcionarios Soportes Id</th>
									<th >Descripcion</th>
									<th >Material Usado</th>
									<th >Fecha Creacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anotaciones as $anotacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $anotacione->atencion_id }}</td>
										<td >{{ $anotacione->funcionarios_soportes_id }}</td>
										<td >{{ $anotacione->descripcion }}</td>
										<td >{{ $anotacione->material_usado }}</td>
										<td >{{ $anotacione->fecha_creacion }}</td>

                                            <td>
                                                <form action="{{ route('anotaciones.destroy', $anotacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('anotaciones.show', $anotacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('anotaciones.edit', $anotacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $anotaciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
