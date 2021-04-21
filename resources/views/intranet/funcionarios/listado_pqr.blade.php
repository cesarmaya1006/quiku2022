@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 table-responsive">
                <table class="table table-striped table-hover table-sm display">
                    <thead>
                        <tr>
                            <th>Id Registro</th>
                            <th>Tipo de PQR</th>
                            <th>Estado</th>
                            <th>Fecha de radicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pqr_S as $pqr)
                            <tr>
                                <td>{{ $pqr->id }}</td>
                                <td>{{ $pqr->tipo }}</td>
                                <td>{{ $pqr->estado }}</td>
                                <td>{{ $pqr->fecha_radicado }}</td>
                            </tr>
                        @endforeach
                        @foreach ($consultas as $consulta)
                            <tr>
                                <td>{{ $consulta->id }}</td>
                                <td>{{ $consulta->tipo }}</td>
                                <td>{{ $consulta->estado }}</td>
                                <td>{{ $consulta->fecha_radicado }}</td>
                            </tr>
                        @endforeach
                        @foreach ($sugerecias as $sugerecia)
                            <tr>
                                <td>{{ $sugerecia->id }}</td>
                                <td>{{ $sugerecia->tipo }}</td>
                                <td>{{ $sugerecia->estado }}</td>
                                <td>{{ $sugerecia->fecha_radicado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
<!-- ************************************************************* -->
