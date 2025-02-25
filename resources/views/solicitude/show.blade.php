@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? __('Show') . " " . __('Solicitude') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Solicitude</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('solicitudes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Funcionario Id:</strong>
                                    {{ $solicitude->funcionario_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Equipo Id:</strong>
                                    {{ $solicitude->equipo_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion Solicitud:</strong>
                                    {{ $solicitude->descripcion_solicitud }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Archivo:</strong>
                                    {{ $solicitude->archivo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $solicitude->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Creacion:</strong>
                                    {{ $solicitude->fecha_creacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Funcionarios Soportes Id:</strong>
                                    {{ $solicitude->funcionarios_soportes_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
