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
    <h2 style="margin:0px">Listado de Mejoras</h2>
</div>
@if(!empty($observaciones))
<div class="m-t-30">
    <table>
        <tr class="cabecera">
            <th>Actividad</th>
            <th>Observación</th>
            <th>Fecha de Registro</th>
        </tr>
        @foreach($observaciones as $observaciones)
            @if($observaciones->actualizacion == 'SI')
            <tr>
                <td>{{$observaciones->titulo}}</td>
                <td>{{$observaciones->observacion}}</td>
                <td>{{$observaciones->created_at->format('d/m/Y')}}</td>
            </tr>
            @endif
        @endforeach
    </table>
</div>
@endif
@endsection