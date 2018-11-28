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
            <th>Autor</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Usuario/Cliente</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        @foreach($proyectos->ninguna as $ninguna)
        <tr>
            <td>{{$ninguna->nombre}}</td>
            <td>{{$ninguna->autor}}</td>
            <td>{{$ninguna->correo}}</td>
            <td>{{$ninguna->telefono}}</td>
            <td>{{$ninguna->cliente}}</td>
            <td>{{$ninguna->correo_cliente}}</td>
            <td>{{$ninguna->telefono_cliente}}</td>
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
            <th>Autor</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Usuario/Cliente</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        @foreach($proyectos->preliminar as $preliminar)
        <tr>
            <td>{{$preliminar->nombre}}</td>
            <td>{{$preliminar->autor}}</td>
            <td>{{$preliminar->correo}}</td>
            <td>{{$preliminar->telefono}}</td>
            <td>{{$preliminar->cliente}}</td>
            <td>{{$preliminar->correo_cliente}}</td>
            <td>{{$preliminar->telefono_cliente}}</td>
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
            <th>Autor</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Usuario/Cliente</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        @foreach($proyectos->diagramacion as $diagramacion)
        <tr>
            <td>{{$diagramacion->nombre}}</td>
            <td>{{$diagramacion->autor}}</td>
            <td>{{$diagramacion->correo}}</td>
            <td>{{$diagramacion->telefono}}</td>
            <td>{{$diagramacion->cliente}}</td>
            <td>{{$diagramacion->correo_cliente}}</td>
            <td>{{$diagramacion->telefono_cliente}}</td>
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
            <th>Autor</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Usuario/Cliente</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        @foreach($proyectos->publicacion as $publicacion)
        <tr>
            <td>{{$publicacion->nombre}}</td>
            <td>{{$publicacion->autor}}</td>
            <td>{{$publicacion->correo}}</td>
            <td>{{$publicacion->telefono}}</td>
            <td>{{$publicacion->cliente}}</td>
            <td>{{$publicacion->correo_cliente}}</td>
            <td>{{$publicacion->telefono_cliente}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection