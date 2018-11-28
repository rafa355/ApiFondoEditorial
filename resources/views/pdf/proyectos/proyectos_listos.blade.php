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
    <h2 style="margin:0px">Listado de Proyectos Finalizados</h2>
</div>
@if(!empty($proyectos->listos[0]))
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
        @foreach($proyectos->listos as $listos)
        <tr>
            <td>{{$listos->nombre}}</td>
            <td>{{$listos->autor}}</td>
            @php $fecha =explode(" ",$listos->created_at); @endphp
            <td>{{$listos->tiempo_real}}</td>
            <td>{{$listos->deposito}}</td>
            <td>{{$listos->isbn}}</td>
            <td>{{$listos->link}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection