@extends('layouts.app')

@section('template_title')
    {{ $persona->name ?? __('Show') . " " . __('Persona') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('dashboard') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Persona:</strong>
                                    {{ $persona->nombre_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Persona:</strong>
                                    {{ $persona->apellido_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email Persona:</strong>
                                    {{ $persona->email_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono Persona:</strong>
                                    {{ $persona->telefono_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ci Persona:</strong>
                                    {{ $persona->ci_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion Persona:</strong>
                                    {{ $persona->direccion_persona }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Nacimiento Persona:</strong>
                                    {{ $persona->fecha_nacimiento_persona }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
