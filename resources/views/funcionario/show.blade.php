@extends('layouts.app')

@section('template_title')
    {{ $funcionario->name ?? __('Show') . " " . __('Funcionario') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Funcionario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="dashboard"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Persona:</strong>
                                    {{ $funcionario->persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Username:</strong>
                                    {{ $funcionario->username }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Password:</strong>
                                    {{ $funcionario->password }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email Inst:</strong>
                                    {{ $funcionario->email_inst }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cargo:</strong>
                                    {{ $funcionario->cargo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Oficina:</strong>
                                    {{ $funcionario->oficina }}
                                <div class="form-group mb-2 mb20">
                                    <label class="form-label">{{ __('Imagen de Perfil') }}</label>
                                    <div class="d-flex justify-content-start">
                                        @if($funcionario->imagen)
                                            <img src="{{ asset('storage/' . $funcionario->imagen) }}" class="rounded border" style="width: 150px; height: 150px; object-fit: cover;" alt="Imagen de perfil">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center border" style="width: 150px; height: 150px; background-color: #f0f0f0;">
                                                <span class="text-muted">Sin imagen</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Celular:</strong>
                                    {{ $funcionario->celular }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $funcionario->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol Personal:</strong>
                                    {{ $funcionario->rol_personal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Creacion:</strong>
                                    {{ $funcionario->fecha_creacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
