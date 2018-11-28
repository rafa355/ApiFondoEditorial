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
            <th>Fecha de Publicación</th>
            <th>Deposito Legal</th>
            <th>ISBN/ISSN</th>
            <th>Link</th>
        </tr>
        @foreach($proyectos->todas as $todas)
        <tr>
            <td>{{$todas->nombre}}</td>
            <td>{{$todas->autor}}</td>
            @php $fecha =explode(" ",$todas->created_at); @endphp
            <td>{{$todas->tiempo_real}}</td>
            <td>{{$todas->deposito}}</td>
            <td>{{$todas->isbn}}</td>
            <td>{{$todas->link}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection