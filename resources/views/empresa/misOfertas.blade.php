<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mis ofertas</title>
</head>
<body>

    <nav>
        <button><a href="{{route('empresa.perfil', ["idUsu" => Auth::user()->idUsu])}}">Perfil</a></button>
        <button><a href="{{route('empresa.crearOferta', ["idUsu" => Auth::user()->idUsu])}}">Crear Oferta</a></button>
        <button><a href="{{route('empresa.solicitudesEmpresa')}}">Solicitudes</a></button>
        <button><a href="{{route("out")}}">Log out</a></button>
    </nav>

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
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>