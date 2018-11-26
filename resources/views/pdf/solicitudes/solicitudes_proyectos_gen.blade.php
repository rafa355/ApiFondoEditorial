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
    <h2 style="margin:0px">Listado de Solicitudes - Proyectos</h2>
</div>
@if(!empty($solicitudes->todas[0]))
<div class="m-t-60">
    <table>
        <tr class="cabecera">
            <th>Nombre de Solicitud</th>
            <th>Usuario/Cliente</th>
            <th>Tipo de Publicación</th>
            <th>Fecha de Solicitud</th>
            <th>Proyectos</th>
        </tr>
        @foreach($solicitudes->todas as $todas)
        <tr>
            <td>{{$todas->nombre}}</td>
            <td>{{$todas->solicitante->nombre}}</td>
            <td>
                @if( $todas->publicacion == 'si') Publicación @else  No Publicación @endif
            </td>
            <td>{{$todas->created_at->format('d/m/Y')}}</td>
            <td>
                @foreach($todas->proyecto as $proyecto)
                   <b>{{$proyecto->nombre}}</b> <br> Fecha de Inicio: {{$proyecto->created_at->format('d/m/Y')}} <br> Fecha Estimada: {{$proyecto->tiempo_planificado_total}} <br> Fecha Real: @if(empty($proyecto->tiempo_real_total)) sin confirmar @else $proyecto->tiempo_real_total @endif   <br><br>
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection