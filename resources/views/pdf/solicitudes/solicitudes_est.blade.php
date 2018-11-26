@extends('pdf.base')

@section('content')
<div class="fecha">
    <div class="contenedor_fecha">
        Fecha: {{$parametros->fecha_actual}}
        <br><br>
        Periodo: {{$parametros->periodo_bajo}} - {{$parametros->periodo_alto}}
    </div>
</div>
<div class="titulo">
    <h2 style="margin:0px">Listado de Solicitudes</h2>
    <h4 style="margin:0px">(Segun Estado)</h4>
</div>
@if(!empty($solicitudes->activas[0]))
<div class="m-t-30">
    <div class="titulo">
        <h3 style="margin:0px">Activas</h3>
    </div>
    <table>
        <tr class="cabecera">
            <th>Nombre de Solicitud</th>
            <th>Usuario/Cliente</th>
            <th>Persona Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Solicitud</th>
            <th>Estado</th>
        </tr>
        @foreach($solicitudes->activas as $activas)
        <tr>
            <td>{{$activas->nombre}}</td>
            <td>{{$activas->solicitante->nombre}}</td>
            <td>{{$activas->contacto}}</td>
            <td>{{$activas->telefono}}</td>
            <td>{{$activas->correo}}</td>
            <td>{{$activas->created_at->format('d/m/Y')}}</td>
            <td>{{$activas->status}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@if(!empty($solicitudes->pendientes[0]))
<div class="m-t-30">
    <div class="titulo">
        <h3 style="margin:0px">Pendientes</h3>
    </div>
    <table>
        <tr class="cabecera">
            <th>Nombre de Solicitud</th>
            <th>Usuario/Cliente</th>
            <th>Persona Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Solicitud</th>
            <th>Estado</th>
        </tr>
        @foreach($solicitudes->pendientes as $pendientes)
        <tr>
            <td>{{$pendientes->nombre}}</td>
            <td>{{$pendientes->solicitante->nombre}}</td>
            <td>{{$pendientes->contacto}}</td>
            <td>{{$pendientes->telefono}}</td>
            <td>{{$pendientes->correo}}</td>
            <td>{{$pendientes->created_at->format('d/m/Y')}}</td>
            <td>{{$pendientes->status}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@if(!empty($solicitudes->anuladas[0]))
<div class="m-t-30">
    <div class="titulo">
        <h3 style="margin:0px">Anuladas</h3>
    </div>
    <table>
        <tr class="cabecera">
            <th>Nombre de Solicitud</th>
            <th>Usuario/Cliente</th>
            <th>Persona Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Solicitud</th>
            <th>Estado</th>
        </tr>
        @foreach($solicitudes->anuladas as $anuladas)
        <tr>
            <td>{{$anuladas->nombre}}</td>
            <td>{{$anuladas->solicitante->nombre}}</td>
            <td>{{$anuladas->contacto}}</td>
            <td>{{$anuladas->telefono}}</td>
            <td>{{$anuladas->correo}}</td>
            <td>{{$anuladas->created_at->format('d/m/Y')}}</td>
            <td>anulada</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection