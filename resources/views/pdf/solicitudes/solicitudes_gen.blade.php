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
</div>
@if(!empty($solicitudes->todas[0]))
<div class="m-t-60">
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
        @foreach($solicitudes->todas as $todas)
        <tr>
            <td>{{$todas->nombre}}</td>
            <td>{{$todas->solicitante->nombre}}</td>
            <td>{{$todas->contacto}}</td>
            <td>{{$todas->telefono}}</td>
            <td>{{$todas->correo}}</td>
            <td>{{$todas->created_at->format('d/m/Y')}}</td>
            <td>{{$todas->status}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection