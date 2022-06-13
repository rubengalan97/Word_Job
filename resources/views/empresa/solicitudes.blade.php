<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Solicitudes de los usuarios</title>
</head>
<body>

    {{-- {{$solicitudes}} --}}

    <table>
        <thead>
            <th>Usuario</th>
            <th>idOfe</th>
            <th>Estado</th>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)

                @foreach ($solicitud->solicitudes() as $item)

                    <tr>
                        <td>{{$item->email}}</td>
                        <td>{{$item->pivot['idOfe']}}</td>
                        <td>{{$solicitud->estado($item->pivot['idOfe'], $item->pivot['idUsu'])->estado}}</td>
                        <td><button><a href="{{route('empresa.borrarOfertaEmpresa', $solicitud)}}">Borrar</a></button></td>
                        <td><button><a href="{{route('empresa.usuario', ['idUsu' => $item->pivot['idUsu'], 'idOfe' => $item->pivot['idOfe']])}}">Consultar Usuario</a></button></td>
                        <td><button><a href="{{route('empresa.cambiarEstado', ["estado" => 'Aceptada', 'idUsu' => $item->pivot['idUsu'], 'idOfe' => $item->pivot['idOfe']] )}}">Aceptar solicitud</a></button></td>
                        <td><button><a href="{{route('empresa.cambiarEstado', ["estado" => 'Denegada', 'idUsu' => $item->pivot['idUsu'], 'idOfe' => $item->pivot['idOfe']] )}}">Denegar solicitud</a></button></td>
                    </tr>
                @endforeach

            @endforeach
           
        </tbody>
    </table>
    
</body>
</html>