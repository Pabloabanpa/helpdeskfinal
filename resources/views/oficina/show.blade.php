@extends('layouts.app')

@section('template_title')
    {{ $oficina->name ?? __('Show') . " " . __('Oficina') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Oficina</span>
                        </div>
                        <div class="float-right">
                            <div class="float-right">
                                <a class="btn btn-primary btn-sm" href="dashboard"> {{ __('Back') }}</a>
                            </div>                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $oficina->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $oficina->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $oficina->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Encargado:</strong>
                                    {{ $oficina->encargado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
