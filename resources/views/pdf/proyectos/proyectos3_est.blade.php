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
    <h4 style="margin:0px">(Segun Estado)</h4>
</div>

@if(!empty($proyectos->ninguna[0]))
<div class="m-t-30">
<div class="titulo">
        <h3 style="margin:0px">En Espera</h3>
    </div>
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
        @foreach($proyectos->ninguna as $ninguna)
        <tr>
            <td>{{$ninguna->nombre}}</td>
            <td>{{$ninguna->cliente}}</td>
            <td>{{$ninguna->tipo}}</td>
            <td>@if(empty($ninguna->responsable)) Sin Asignar @else {{$ninguna->responsable}} @endif</td>
            @php $fecha =explode(" ",$ninguna->created_at); @endphp
            <td>{{$fecha[0]}}</td>
            <td>{{$ninguna->fecha_estimada}}</td>
            <td>{{$ninguna->tiempo_real}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@if(!empty($proyectos->preliminar[0]))
<div class="m-t-30">
<div class="titulo">
        <h3 style="margin:0px">Preliminar</h3>
    </div>
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
        @foreach($proyectos->preliminar as $preliminar)
        <tr>
            <td>{{$preliminar->nombre}}</td>
            <td>{{$preliminar->cliente}}</td>
            <td>{{$preliminar->tipo}}</td>
            <td>@if(empty($preliminar->responsable)) Sin Asignar @else {{$preliminar->responsable}} @endif</td>
            @php $fecha =explode(" ",$preliminar->created_at); @endphp
            <td>{{$fecha[0]}}</td>
            <td>{{$preliminar->fecha_estimada}}</td>
            <td>{{$preliminar->tiempo_real}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@if(!empty($proyectos->diagramacion[0]))
<div class="m-t-30">
<div class="titulo">
        <h3 style="margin:0px">Diagramación</h3>
    </div>
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
        @foreach($proyectos->diagramacion as $diagramacion)
        <tr>
            <td>{{$diagramacion->nombre}}</td>
            <td>{{$diagramacion->cliente}}</td>
            <td>{{$diagramacion->tipo}}</td>
            <td>@if(empty($diagramacion->responsable)) Sin Asignar @else {{$diagramacion->responsable}} @endif</td>
            @php $fecha =explode(" ",$diagramacion->created_at); @endphp
            <td>{{$fecha[0]}}</td>
            <td>{{$diagramacion->fecha_estimada}}</td>
            <td>{{$diagramacion->tiempo_real}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@if(!empty($proyectos->publicacion[0]))
<div class="m-t-30">
<div class="titulo">
        <h3 style="margin:0px">Publicación</h3>
    </div>
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
        @foreach($proyectos->publicacion as $publicacion)
        <tr>
            <td>{{$publicacion->nombre}}</td>
            <td>{{$publicacion->cliente}}</td>
            <td>{{$publicacion->tipo}}</td>
            <td>@if(empty($publicacion->responsable)) Sin Asignar @else {{$publicacion->responsable}} @endif</td>
            @php $fecha =explode(" ",$publicacion->created_at); @endphp
            <td>{{$fecha[0]}}</td>
            <td>{{$publicacion->fecha_estimada}}</td>
            <td>{{$publicacion->tiempo_real}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection