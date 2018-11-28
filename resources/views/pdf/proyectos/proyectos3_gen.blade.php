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
            <th>Autor</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Usuario/Cliente</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        @foreach($proyectos->todas as $todas)
        <tr>
            <td>{{$todas->nombre}}</td>
            <td>{{$todas->autor}}</td>
            <td>{{$todas->correo}}</td>
            <td>{{$todas->telefono}}</td>
            <td>{{$todas->cliente}}</td>
            <td>{{$todas->correo_cliente}}</td>
            <td>{{$todas->telefono_cliente}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection