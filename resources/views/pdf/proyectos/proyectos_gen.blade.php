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
    <h2 style="margin:0px">Listado de Proyectos</h2>
</div>
@if(!empty($proyectos->todas[0]))
<div class="m-t-30">
    <table>
        <tr class="cabecera">
            <th>Nombre de Proyecto</th>
            <th>Usuario/Cliente</th>
            <th>Tipo de proyecto</th>
            <th>Diseñador</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Entrega Estimada</th>
            <th>Fecha de Entrega Real</th>
        </tr>
        @foreach($proyectos->todas as $todas)
        <tr>
            <td>{{$todas->nombre}}</td>
            <td>{{$todas->cliente}}</td>
            <td>{{$todas->tipo}}</td>
            <td>@if(empty($todas->responsable)) Sin Asignar @else {{$todas->responsable}} @endif</td>
            @php $fecha =explode(" ",$todas->created_at); @endphp
            <td>{{$fecha[0]}}</td>
            <td>{{$todas->fecha_estimada}}</td>
            <td>{{$todas->tiempo_real}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection