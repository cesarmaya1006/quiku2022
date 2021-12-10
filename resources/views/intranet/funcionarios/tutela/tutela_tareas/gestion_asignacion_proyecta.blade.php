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
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gestión a Tutela Número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Número de radicado:
                                    <strong>{{ $tutela->radicado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha de notificación: <strong>{{ $tutela->fecha_notificacion}}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha de radicado: <strong>{{ $tutela->fecha_radicado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Jurisdicción: <strong>{{ $tutela->jurisdiccion }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Juzgado: <strong>{{ $tutela->juzgado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Departatmento :
                                    <strong>{{ $tutela->departamento }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Municipio : <strong>{{ $tutela->municipio }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Nombre Juez : <strong>{{ $tutela->nombre_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Dirección Juzgado : <strong>{{ $tutela->direccion_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Teléfono Juzgado: <strong>{{ $tutela->telefono_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Correo Juzgado: <strong>{{ $tutela->correo_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Estado : <strong>{{ $tutela->estado->estado_funcionario }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Prioridad : <strong>{{ $tutela->prioridad->prioridad }}</strong>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: solid 4px black">

                        <div class="col-12 rounded border mb-3 p-2 pt-3">
                            <div class="row d-flex px-4"> 
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Prioridad</label>
                                    <select class="custom-select rounded-0 prioridad" required>
                                        @foreach ($estadoPrioridad as $prioridad)
                                            <option value="{{ $prioridad->id }}"
                                                {{ $tutela->prioridad->id == $prioridad->id ? 'selected' : '' }}>
                                                {{ $prioridad->prioridad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                    <button href="" class="btn btn-primary mx-2 px-4 prioridad_guardar" data_url="{{ route('prioridad_tutela_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar prioridad</button>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: solid 4px black">

                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="menu-card">
                                <div class="col-12 mt-2">
                                    <h5>Detalle Tutela</h5>
                                </div>
                                <hr>
                                <div class="col-12 mt-2">
                                    <h5>Términos</h5>
                                </div>
                                <div class="row px-2">
                                    <div class="col-12">
                                        <p class="text-justify"><strong>Días:</strong> {{ $tutela->dias_termino }}</p>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-justify"><strong>Horas:</strong> {{ $tutela->horas_termino }}</p>
                                    </div>
                                    @if ($tutela->url_admisorio)
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Archivo auto admisorio</h6>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-light" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Titulo</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Descarga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-justify">{{ $tutela->titulo_admisorio }}</td>
                                                        <td class="text-justify">{{ $tutela->descripcion_admisorio }}</td>
                                                        <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
                                                                target="_blank"
                                                                rel="noopener noreferrer">Descargar</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @if ($tutela->medida_cautelar == 'true')
                                            <hr>
                                            <div class="col-12 my-2">
                                                <h5> Medida Cautelar</h5>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Descripción:</strong> {{ $tutela->text_medida_cautelar }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Días:</strong> {{ $tutela->dias_medida_cautelar }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Horas:</strong> {{ $tutela->horas_medida_cautelar }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                <hr>
                            </div>
                            <div class="row menu-card p-2">
                                <div class="col-12">
                                    <h5>Accionantes</h5>
                                </div>
                                <div class="col-12 mt-2">
                                    @foreach ( $tutela->accions as $accion)
                                        <div class="col-12 row">
                                            <div class="col-6">
                                                <div class="col-12 mb-3">
                                                    <h6 class="pl-4">Accionante</h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Nombre:</strong> {{ $accion->nombres_accion }}  {{ $accion->apellidos_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo Persona:</strong> {{ $accion->tipo_persona_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo Documento:</strong> {{ $accion->docutipos_id_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Número Documento:</strong> {{ $accion->numero_documento_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Teléfono:</strong> {{ $accion->telefono_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Dirección:</strong> {{ $accion->direccion_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Correo:</strong> {{ $accion->correo_accion }}</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if($accion->nombre_apoderado)
                                                    <div class="col-12  mb-3">
                                                        <h6 class="pl-4">Apoderado</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Nombre:</strong> {{ $accion->nombre_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tipo Documento:</strong> {{ $accion->docutipos_id_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Número Documento:</strong> {{ $accion->numero_documento_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tarjeta Profesional:</strong> {{ $accion->tarjeta_profesional_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Teléfono:</strong> {{ $accion->telefono_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Dirección:</strong> {{ $accion->direccion_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Correo:</strong> {{ $accion->correo_apoderado }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach  
                                </div>
                            </div>
                            @if(sizeOf($tutela->anexostutela))
                                <div class="menu-card">
                                    <div class="col-12 row mb-2">
                                        <div class="col-6">
                                            <h5>Anexos</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-light"  style="font-size: 0.8em;" >
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Archivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tutela->anexostutela as $anexo)
                                                        <tr>
                                                            <td class="text-justify">{{ $anexo->titulo }}
                                                            </td>
                                                            <td class="text-justify">
                                                                {{ $anexo->descripcion }}
                                                            </td>
                                                            <td><a href="{{ asset('documentos/tutelas/' . $anexo->url) }}"
                                                                    target="_blank"
                                                                    rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif 
                            <div class="row menu-card p-2">
                                <div class="col-12 mb-2">
                                    <h5>Hechos</h5>
                                </div>
                                @foreach ( $tutela->hechos as $key => $hecho)
                                    <div class="rounded border my-3">
                                        <div class="col-12 row my-3">
                                            <div class="col-6 mb-3">
                                                <h5 class="pl-4">Hecho # {{$key + 1}}</h5>
                                            </div>
                                            <div class="col-6 row estado-hecho justify-content-end pb-3">
                                                <div class="col-2 d-flex mb-2">
                                                    <h6>Avance:</h6>
                                                </div>
                                                <select class="custom-select rounded-0 estadoHecho col-4">
                                                    @foreach ($estados as $estado)
                                                        <option value="{{ $estado->id }}"
                                                        {{ $hecho->estadohecho->id == $estado->id ? 'selected' : '' }}>
                                                        {{ $estado->estado }} %</option>
                                                    @endforeach
                                                </select>
                                                <button type="" class="btn btn-primary btn-estado-hecho col-2 mx-2"
                                                    data_url="{{ route('estado_hecho_guardar') }}"
                                                    data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">{{ $hecho->hecho }}</p>
                                                <input class="id_hecho" type="hidden" value="{{$hecho->id}}">
                                            </div>
                                        </div>
                                        <hr>
                                        <h6 class="">Historial hecho</h6>
                                        <div class="row d-flex px-12 p-3">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Empleado</th>
                                                            <th scope="col">Historial</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($hecho->historialHechos as $historialHecho)
                                                            <tr>
                                                                <td>{{ $historialHecho->created_at }}</td>
                                                                <td class="text-justify">{{ $historialHecho->empleado->nombre1 }} {{ $historialHecho->empleado->apellido1 }}</td>
                                                                <td class="text-justify">{{ strip_tags($historialHecho->historial) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row d-flex px-12 p-3 mensaje-hecho"> 
                                            <input class="id_hecho" type="hidden" value="{{ $hecho->id }}">
                                            <div class="container-mensaje-historial form-group col-12">
                                                <label for="" class="">Agregar Historial</label>
                                                <textarea class="form-control mensaje-historial-hecho" rows="3" placeholder="" required></textarea>
                                            </div>
                                            <div class="col-12 col-md-12 form-group d-flex">
                                                <button href="" class="btn btn-primary px-4 guardarHistorialHecho" data_url="{{ route('historial_hecho_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar historial</button>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach  
                            </div>
                            <hr>
                            <div class="row menu-card p-2">
                                <div class="col-12 mb-2">
                                    <h5>Pretensiones</h5>
                                </div>
                                @foreach ( $tutela->pretensiones as $key => $pretension)
                                    <div class="rounded border my-3">
                                        <div class="col-12 row my-3">
                                            <div class="col-6 mb-3">
                                                <h5 class="pl-4">Pretensión # {{$key + 1}}</h5>
                                            </div>
                                            <div class="col-6 row estado-pretension justify-content-end pb-3">
                                                <div class="col-2 d-flex mb-2">
                                                    <h6>Avance:</h6>
                                                </div>
                                                <select class="custom-select rounded-0 estadoPretension col-4">
                                                    @foreach ($estados as $estado)
                                                        <option value="{{ $estado->id }}"
                                                        {{ $pretension->estadopretension->id == $estado->id ? 'selected' : '' }}>
                                                        {{ $estado->estado }} %</option>
                                                    @endforeach
                                                </select>
                                                <button type="" class="btn btn-primary btn-estado-pretension col-2 mx-2"
                                                    data_url="{{ route('estado_pretension_guardar') }}"
                                                    data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">{{ $pretension->pretension }}</p>
                                                <input class="id_pretension" type="hidden" value="{{$pretension->id}}">
                                            </div>
                                        </div>
                                        <h6 class="">Historial pretensión</h6>
                                        <div class="row d-flex px-12 p-3">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Empleado</th>
                                                            <th scope="col">Historial</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pretension->historialPretensiones as $historialPretension)
                                                            <tr>
                                                                <td>{{ $historialPretension->created_at }}</td>
                                                                <td class="text-justify">{{ $historialPretension->empleado->nombre1 }} {{ $historialPretension->empleado->apellido1 }}</td>
                                                                <td class="text-justify">{{ strip_tags($historialPretension->historial) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row d-flex px-12 p-3 mensaje-pretension"> 
                                            <input class="id_pretension" type="hidden" value="{{ $pretension->id }}">
                                            <div class="container-mensaje-historial form-group col-12">
                                                <label for="" class="">Agregar Historial</label>
                                                <textarea class="form-control mensaje-historial-pretension" rows="3" placeholder="" required></textarea>
                                            </div>
                                            <div class="col-12 col-md-12 form-group d-flex">
                                                <button href="" class="btn btn-primary px-4 guardarHistorialPretension" data_url="{{ route('historial_pretension_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar historial</button>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach  
                            </div>
                            <hr>
                            @if(sizeOf($tutela->argumentos))
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Argumentos</h5>
                                    </div>
                                    @foreach ( $tutela->argumentos as $key => $argumento)
                                        <div class="col-12 row t">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Argumento # {{$key + 1}}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">{{ $argumento->argumento }}</p>
                                            </div>
                                        </div>
                                    @endforeach  
                                </div>
                                <hr>
                            @endif
                            @if(sizeOf($tutela->pruebas))
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Pruebas</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-light"  style="font-size: 0.8em;" >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Archivo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tutela->pruebas as $anexo)
                                                            <tr>
                                                                <td class="text-justify">{{ $anexo->titulo }}
                                                                </td>
                                                                <td class="text-justify">
                                                                    {{ $anexo->descripcion }}
                                                                </td>
                                                                <td><a href="{{ asset('documentos/tutelaspruebas/' . $anexo->url) }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer">Descargar</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            @if(sizeOf($tutela->motivos))
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Motivos</h5>
                                    </div>
                                    @foreach ( $tutela->motivos as $key => $motivo)
                                        <div class="col-6 row">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Motivo # {{$key + 1}}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Motivo:</strong> {{ $motivo->motivo_tutela }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Sub - motivo:</strong> {{ $motivo->sub_motivo_tutela }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tutela sobre:</strong> {{ $motivo->tipo_tutela }}</p>
                                            </div>
                                        </div>
                                    @endforeach  
                                </div>
                                <hr>
                            @endif
                        </div>
                    </div> 
                    <div class="rounded border m-3 p-4">
                        <h5 class="">Gestión Hechos</h5>
                        <div class="col-12 table-responsive d-flex justify-content-center">
                            <table class="table table-striped col-12" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Hecho #</th>
                                        <th scope="col">Funcionario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutela->hechos as $key=> $hecho)
                                        <tr>
                                            @if($hecho->empleado)
                                                <td class="bg-success">{{$key + 1}}</td>
                                                <td class="bg-success">{{$hecho->empleado->nombre1 }} {{$hecho->empleado->apellido1}}</td>
                                            @else    
                                                <td class="bg-danger">{{$key + 1}}</td>
                                                <td class="bg-danger">Sin asignar</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <h5 class="">Asignación Hechos</h5>
                        <div class="row d-flex px-4"> 
                            <div class="col-12 col-md-5 form-group">
                                <label for="">Hecho</label>
                                <select class="custom-select rounded-0 hecho" required="">                                    
                                @foreach($tutela->hechos as $key=> $hecho)
                                    <option value="{{$hecho->id}}">{{$key + 1}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-5 form-group">
                                <label for="">Cargo</label>
                                <select class="custom-select rounded-0 cargo" required="" data_url="{{ route('cargar_cargos') }}" data_url2="{{ route('cargar_funcionarios') }}">
                                </select>
                            </div>
                            <div class="col-12 col-md-5 form-group">
                                <label for="">Funcionario</label>
                                <select class="custom-select rounded-0 funcionario" required="">
                                    <option value="">--Seleccione--</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                <button href="" class="btn btn-primary mx-2 px-4 asignacion_hecho_guardar" data_url="{{ route('asignacion_hecho_guardar') }}"
                                data_token="{{ csrf_token() }}">Asignar hecho</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="rounded border m-3 p-4">
                        <h5 class="">Gestión Pretensiones</h5>
                        <div class="col-12 table-responsive d-flex justify-content-center">
                            <table class="table table-striped col-12" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Pretensión #</th>
                                        <th scope="col">Funcionario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutela->pretensiones as $key=> $pretension)
                                        <tr>
                                            @if($pretension->empleado)
                                                <td class="bg-success">{{$key + 1}}</td>
                                                <td class="bg-success">{{$pretension->empleado->nombre1 }} {{$hecho->empleado->apellido1}}</td>
                                            @else    
                                                <td class="bg-danger">{{$key + 1}}</td>
                                                <td class="bg-danger">Sin asignar</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <h5 class="">Asignación Pretensiones</h5>
                        <div class="row d-flex px-4"> 
                            <div class="col-12 col-md-5 form-group">
                                <label for="">Pretensión</label>
                                <select class="custom-select rounded-0 pretension" required="">                                    
                                @foreach($tutela->pretensiones as $key=> $pretension)
                                    <option value="{{$pretension->id}}">{{$key + 1}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-5 form-group">
                                <label for="">Cargo</label>
                                <select class="custom-select rounded-0 cargo" required="" data_url="{{ route('cargar_cargos') }}" data_url2="{{ route('cargar_funcionarios') }}">
                                </select>
                            </div>
                            <div class="col-12 col-md-5 form-group">
                                <label for="">Funcionario</label>
                                <select class="custom-select rounded-0 funcionario" required="">
                                    <option value="">--Seleccione--</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                <button href="" class="btn btn-primary mx-2 px-4 asignacion_pretension_guardar" data_url="{{ route('asignacion_pretension_guardar') }}"
                                data_token="{{ csrf_token() }}">Asignar pretensión</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="rounded border m-3 p-4">
                        <h5 class="">Historial de tareas</h5>
                        <div class="row d-flex px-12 p-3">
                            <div class="col-12 table-responsive">
                                <table class="table table-light" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Historial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->historialtareas as $historial)
                                            <tr>
                                                <td>{{ $historial->created_at }}</td>
                                                @if($historial->tarea)
                                                    <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                @else
                                                    <td class="text-justify">ADMINISTRADOR</td>
                                                @endif
                                                <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                <td class="text-justify">{{ $historial->historial }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-flex px-12 p-3"> 
                            <input class="id_tarea" type="hidden" value="2">
                            <div class="container-mensaje-historial-tarea form-group col-12">
                                <label for="" class="">Agregar Historial</label>
                                <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                            </div>
                            <div class="col-12 col-md-12 form-group d-flex align-items-end justify-content-end">
                                <button href="" class="btn btn-primary mx-2 px-4 guardarHistorialTarea" data_url="{{ route('historial_tarea_tutela_guardar') }}"
                                data_token="{{ csrf_token() }}">Guardar</button>
                            </div>
                        </div>
                    </div>

                    {{-- @if(sizeOf($pqr->anexos))
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Historial de respuesta </h5>
                            <div class="row d-flex px-12 p-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-light" style="font-size: 0.8em;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Empleado</th>
                                                <th scope="col">Tarea</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descarga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pqr->anexos as $anexo)
                                                <tr>
                                                    <td>{{ $anexo->created_at }}</td>
                                                    <td class="text-justify">{{ $anexo->empleado->nombre1 }} {{ $anexo->empleado->apellido1 }}</td>
                                                    <td class="text-justify">{{ $anexo->tarea->tarea }}</td>
                                                    @if($anexo->tipo_respuesta == 0)
                                                        <td>Respuesta PQR</td>
                                                    @elseif($anexo->tipo_respuesta == 1)
                                                        <td>Respuesta aclaración</td>
                                                    @elseif($anexo->tipo_respuesta == 2)
                                                        <td>Respuesta reposición</td>
                                                    @elseif($anexo->tipo_respuesta == 3)
                                                        <td>Respuesta apelación</td>
                                                    @endif
                                                    <td class="text-justify"><a href="{{ asset('documentos/tareas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endif ---}}
                    @if (((($tutela->hechos->sum('estado_id') / $tutela->hechos->count())/ 11) * 100) == 100 )  
                        @if (((($tutela->pretensiones->sum('estado_id') / $tutela->pretensiones->count())/ 11) * 100) == 100 )  
                            <div class="rounded border m-3 p-2 px-4">
                                <h5 class="mt-2">Resuelve</h5>
                                @if(sizeof($tutela->resuelves))
                                    <div class="row d-flex px-12 p-3">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-light" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Orden</th>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Empleado</th>
                                                        <th scope="col">Resuelve</th>
                                                        <th scope="col">Opciones</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $totalResuelves = $tutela->resuelves->count()
                                                @endphp
                                                <tbody class="orden-resuelve">
                                                    @foreach ($tutela->resuelves as $key=> $resuelve )
                                                        <tr >
                                                            <td>{{ $resuelve->orden }}</td>
                                                            <td>{{ $resuelve->created_at }}</td>
                                                            <td class="text-justify">{{ $resuelve->empleado->nombre1 }} {{ $resuelve->empleado->apellido1 }}</td>
                                                            <td class="text-justify contenido-resuelve">{{ strip_tags($resuelve->resuelve) }} <input type="hidden" value="{{$resuelve->resuelve}}"></td>
                                                            <td class="text-justify">
                                                                <div class="col-12 d-flex">
                                                                    <button type="button" class="btn btn-warning btn-xs btn-sombra editarResuelveRecurso py-1 px-2 mx-1 col-4" data-toggle="modal" data-target=".bd-resuelve" value="{{$resuelve->id}}"><i class="fas fa-edit editarResuelveRecurso-i"></i></button>
                                                                    <button type="button" class="btn btn-danger btn-xs btn-sombra eliminarResuelve py-1 px-2 mx-1 col-4" data_url="{{ route('historial_resuelve_eliminar') }}"  data_token="{{ csrf_token() }}" value="{{$resuelve->id}}"><i class="far fa-trash-alt"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                </tbody>
                                                <tbody  class="editar-orden-resuelve d-none">
                                                    @foreach ($tutela->resuelves as $key=> $resuelve )
                                                    <tr>
                                                        <td class="td-orden">
                                                            <select class="select-orden">
                                                            @for ($i = 1; $i < $totalResuelves + 1; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $i == $resuelve->orden ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                            </select>
                                                        </td>
                                                        <td>{{ $resuelve->created_at }}</td>
                                                        <td class="text-justify">{{ $resuelve->empleado->nombre1 }} {{ $resuelve->empleado->apellido1 }}</td>
                                                        <td class="text-justify contenido-resuelve">{{ strip_tags($resuelve->resuelve) }}</td>
                                                        <td class="text-justify">
                                                            <div class="col-12 d-flex">
                                                                <button type="button" class="btn btn-warning btn-xs btn-sombra editarResuelve py-1 px-2 mx-1 col-4" data-toggle="modal" data-target=".bd-resuelve" value="{{$resuelve->id}}" disabled><i class="fas fa-edit editarResuelve-i"></i></button>
                                                                <button type="button" class="btn btn-danger btn-xs btn-sombra eliminarResuelve py-1 px-2 mx-1 col-4" data_url="{{ route('historial_resuelve_eliminar') }}"  data_token="{{ csrf_token() }}" value="{{$resuelve->id}}" disabled><i class="far fa-trash-alt"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row d-flex px-12 p-3"> 
                                                <div class="col-12 col-md-12 form-group d-flex">
                                                    <button href="" class="btn btn-primary mx-2 px-4 btn-ordenar">Ordenar</button>
                                                    <button href="" class="btn btn-primary mx-2 px-4 btn-ordenar-guardar d-none"
                                                        data_url="{{ route('resuelve_orden_guardar') }}"  data_token="{{ csrf_token() }}"
                                                    >Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade bd-resuelve" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar resuelve</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control mensaje-resuelve-editar mt-2" rows="3" cols="40" placeholder="" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary editarResuelveGuardar" data_url="{{ route('historial_resuelve_editar') }}"  data_token="{{ csrf_token() }}">Guardar</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                                <div class="col-12 d-flex row">
                                    <div class="container-mensaje-resuelve form-group col-12 row">
                                        <label for="" class="col-10">Nuevo resuelve</label>
                                        <textarea class="form-control mensaje-resuelve mt-2" rows="3" placeholder="" required></textarea>
                                    </div>
                                    <div class="row d-flex px-12 p-1"> 
                                        <div class="col-12 col-md-12 form-group d-flex">
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-tutela-resuelve"
                                            data_url="{{ route('historial_resuelve_tutela_guardar') }}"  data_token="{{ csrf_token() }}">Crear resuelve</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    @if (((($tutela->hechos->sum('estado_id') / $tutela->hechos->count())/ 11) * 100) == 100 )  
                        @if (((($tutela->pretensiones->sum('estado_id') / $tutela->pretensiones->count())/ 11) * 100) == 100 )  
                            <div class="rounded border m-3 p-2">
                                <h5 class="mt-2">Proyectar</h5>
                                <div class="col-12 d-flex row pqr-anexo">
                                    <div class="my-2 col-12 d-flex">
                                        <h6 class="mr-2">Documento de respuesta</h6>
                                        <strong class="mx-2">
                                            <a href="{{ route('respuestaTutela', ['id' => $tutela->id]) }}" target="_blank" rel="noopener noreferrer">
                                                <i class="fas fa-eye"></i> Vista previa</a>
                                        </strong>
                                    </div>
                                    <div class="container-mensaje-historial-tarea form-group col-12">
                                        <label for="" class="">Agregar Historial</label>
                                        <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                    </div>
                                    <div class="row d-flex px-12 p-3"> 
                                        <div class="col-12 col-md-12 form-group d-flex">
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-tutela" data_url2="{{ route('historial_tarea_tutela_guardar') }}" data_url3="{{ route('cambiar_estado_tareas_tutela_guardar') }}" data_token="{{ csrf_token() }}">Enviar a revisión</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif 
                    @endif 
                    <input class="id_tarea" type="hidden" value="2">
                    <input class="id_auto" type="hidden" value="{{ $tutela->id }}">
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('tutela-gestion') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/gestion_asignacion_proyecta.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
<!-- ************************************************************* -->