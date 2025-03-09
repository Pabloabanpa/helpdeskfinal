@extends('layouts.app')

@section('template_title')
    {{ $funcionariosSoporte->name ?? __('Show') . " " . __('Funcionarios Soporte') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Funcionarios Soporte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('funcionarios-soportes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Funcionario Id:</strong>
                                    {{ $funcionariosSoporte->funcionario?->username }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Username:</strong>
                                    {{ $funcionariosSoporte->username }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Password:</strong>
                                    {{ $funcionariosSoporte->password }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol Id:</strong>
                                    {{ $funcionariosSoporte->rol_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nivel de Atencion:</strong>
                                    {{ $funcionariosSoporte->nivel_atencion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $funcionariosSoporte->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Creacion:</strong>
                                    {{ $funcionariosSoporte->fecha_creacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
