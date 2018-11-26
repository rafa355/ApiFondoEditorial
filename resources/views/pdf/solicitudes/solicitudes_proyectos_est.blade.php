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
            <th>Tipo de Publicación</th>
            <th>Fecha de Solicitud</th>
            <th>Proyectos</th>
        </tr>
        @foreach($solicitudes->activas as $activas)
        <tr>
            <td>{{$activas->nombre}}</td>
            <td>{{$activas->solicitante->nombre}}</td>
            <td>
                @if( $activas->publicacion == 'si') Publicación @else  No Publicación @endif
            </td>
            <td>{{$activas->created_at->format('d/m/Y')}}</td>
            <td>
                @foreach($activas->proyecto as $proyecto)
                   <b>{{$proyecto->nombre}}</b> <br> Fecha de Inicio: {{$proyecto->created_at->format('d/m/Y')}} <br> Fecha Estimada: {{$proyecto->tiempo_planificado_total}} <br> Fecha Real: @if(empty($proyecto->tiempo_real_total)) sin confirmar @else $proyecto->tiempo_real_total @endif   <br><br>
                @endforeach
            </td>
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
            <th>Tipo de Publicación</th>
            <th>Fecha de Solicitud</th>
            <th>Proyectos</th>
        </tr>
        @foreach($solicitudes->pendientes as $pendientes)
        <tr>
            <td>{{$pendientes->nombre}}</td>
            <td>{{$pendientes->solicitante->nombre}}</td>
            <td>
                @if( $pendientes->publicacion == 'si') Publicación @else  No Publicación @endif
            </td>
            <td>{{$pendientes->created_at->format('d/m/Y')}}</td>
            <td>No Posee</td>
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
            <th>Tipo de Publicación</th>
            <th>Fecha de Solicitud</th>
            <th>Proyectos</th>
        </tr>
        @foreach($solicitudes->anuladas as $anuladas)
        <tr>
            <td>{{$anuladas->nombre}}</td>
            <td>{{$anuladas->solicitante->nombre}}</td>
            <td>
                @if( $anuladas->publicacion == 'si') Publicación @else  No Publicación @endif
            </td>
            <td>{{$anuladas->created_at->format('d/m/Y')}}</td>
            <td>
                @foreach($anuladas->proyecto as $proyecto)
                   <b>{{$proyecto->nombre}}</b> <br> Fecha de Inicio: {{$proyecto->created_at->format('d/m/Y')}} <br> Fecha Estimada: {{$proyecto->tiempo_planificado_total}} <br> Fecha Real: @if(empty($proyecto->tiempo_real_total)) sin confirmar @else $proyecto->tiempo_real_total @endif   <br><br>
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection