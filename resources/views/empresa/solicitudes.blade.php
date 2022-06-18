<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/botones.css') }}" >
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

    <div class="cards">
        @foreach ($solicitudes as $solicitud)
            <div class="card">
                @foreach ($solicitud->solicitudes() as $item)
                    <h2 class="titulos">
                        Email: {{$item->email}}
                    </h2>
                    <h3 class="titulos">Oferta:</h3>
                    <p class="descripcion">{{$item->pivot['idOfe']}}</p>
                    <a href="{{route('empresa.usuario', ['idUsu' => $item->pivot['idUsu'], 'idOfe' => $item->pivot['idOfe']])}}"><button class="consultar">Consultar Usuario</button></a>
                    <a href="{{route('empresa.cambiarEstado', ["estado" => 'Aceptada', 'idUsu' => $item->pivot['idUsu'], 'idOfe' => $item->pivot['idOfe']] )}}"><button class="editar">Aceptar solicitud</button></a>
                    <a href="{{route('empresa.cambiarEstado', ["estado" => 'Denegada', 'idUsu' => $item->pivot['idUsu'], 'idOfe' => $item->pivot['idOfe']] )}}"><button class="borrar">Denegar solicitud</button></a>
                @endforeach
            </div>
        @endforeach
    </div>
    
</body>
</html>