<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Solicitudes de los usuarios</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Solicitudes</a>
        <a href="{{route('empresa.perfil')}}">Perfil</a>
        <a href="{{route('empresa.misOfertas')}}">Mis Ofertas</a>
        <a href="{{route('empresa.crearOferta', ["idUsu" => Auth::user()->idUsu])}}">Crear Oferta</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

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
                        {{-- <td><button><a href="{{route('empresa.borrarOfertaEmpresa', $solicitud)}}">Borrar</a></button></td> --}}
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