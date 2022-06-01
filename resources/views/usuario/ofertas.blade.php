<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ofertas</title>
</head>
<body>

    <button><a href="{{route('usuario.perfil', ["idUsu" => Auth::user()->idUsu])}}">Perfil</a></button>
    <button><a href="{{route('usuario.misSolicitudes', ["idUsu" => Auth::user()->idUsu])}}">Mis solicitudes</a></button>

    <table>
        <thead>
            <th>Nombre Empresa</th>
            <th>Descripcion</th>
            <th>Ciudad</th>
        </thead>
        <tbody>
           @foreach ($ofertas as $oferta)
            <tr>
                <td> 
                    @foreach ($oferta->empresas() as $item)
                        {{$item->nombre}}
                   @endforeach
                </td>
                <td>{{$oferta->descripcion}}</td>
                <td>
                    @foreach ($oferta->ciudades() as $item)
                        {{$item->ciudad}}
                    @endforeach
                </td>
                <td><button><a href="{{route('usuario.aceptarOferta', ["idUsu" => Auth::user()->idUsu, "idOfe" => $oferta->idOfe])}}">Aceptar Oferta</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>