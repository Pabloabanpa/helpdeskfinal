@extends('layouts.app')

@section('template_title')
    {{ $atencione->name ?? __('Show') . " " . __('Atencione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Atencione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="dashboard"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Solicitud Id:</strong>
                                    {{ $atencione->solicitud_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Funcionarios Soportes Id:</strong>
                                    {{ $atencione->funcionario_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $atencione->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $atencione->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Inicio:</strong>
                                    {{ $atencione->fecha_inicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Fin:</strong>
                                    {{ $atencione->fecha_fin }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
