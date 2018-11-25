
<!DOCTYPE html>
<html lang="es-ES">
  <!--header!-->
    <header>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            .cabecera {
                background-color: #dddddd;
            }
            .fecha{
                width:100%;
                height:60px;
            }
            .titulo{
                text-align:center;
                margin-top:10px
            }
            .m-t-30{
                margin-top:30px;
            }
            .contenedor_fecha{
                position: absolute;
                 right: 10px;
                 top: 85px;
            }
        </style>
    </header>

    <body>
        <div style="width:100%;height:60px;background-color:#0a3677;border-radius:10px">
            <img style="position: absolute; left: 10px;top: 5px;" class="" width="85" src="{{public_path('images/logouneg.png')}}">
            <img style="position: absolute; right: 30px;top: 5px;" class="" width="35" src="{{public_path('images/logofe.png')}}">
        </div>
        @yield('content')
    </body>
</html>
