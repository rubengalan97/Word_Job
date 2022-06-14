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
    <title>Mis solicitudes</title>
</head>
<body>


    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Mis Solicitudes</a>
        <a href="{{route('usuario.perfil', ["idUsu" => Auth::user()->idUsu])}}">Perfil</a>
        <a href="{{route('usuario.ofertas')}}">Ofertas</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    @if ($solicitudes->count() == 0)
        <h3>No tienes solicitudes</h3>
    @else
        
    <table>
        <thead>
            <th>Nombre empresa</th>
            <th>Descripcion</th>
            <th>Ciudad</th>
            <th>Estado</th>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
            <tr>
                <td>
                    @foreach ($solicitud->empresas() as $item)
                        {{$item->nombre}}
                   @endforeach
                </td>
                <td>{{$solicitud->descripcion}}</td>
                <td>
                    @foreach ($solicitud->ciudades() as $item)
                        {{$item->ciudad}}
                   @endforeach
                </td>
                @foreach ($solicitud->solicitudes() as $item)
                    <td>{{$solicitud->estado($item->pivot['idOfe'], $item->pivot['idUsu'])->estado}}</td>
                @endforeach
                <td><button><a href="{{route('usuario.borrarSolicitud', ["idUsu" => Auth::user()->idUsu, "idOfe" => $solicitud->idOfe])}}">Borrar solicitud</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>


    @endif
    
</body>
</html>