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
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Mis ofertas</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Mi ofertas</a>
        <a href="{{route('empresa.perfil', ["idUsu" => Auth::user()->idUsu])}}">Perfil</a>
        <a href="{{route('empresa.crearOferta', ["idUsu" => Auth::user()->idUsu])}}">Crear Oferta</a>
        <a href="{{route('empresa.solicitudesEmpresa')}}">Solicitudes</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="cards">
        @foreach ($ofertas as $oferta)
        <div class="card">
            <h2 class="titulos">
                @foreach ($oferta->empresas() as $item)
                    Empresa: {{$item->nombre}}
                @endforeach
            </h2>
            <h3 class="titulos">Descripcion:</h3>
            <p class="descripcion">{{$oferta->descripcion}}</p>
            <h4 class="titulos">Ciudad:</h4>
            <h4 class="titulos">
                @foreach ($oferta->ciudades() as $item)
                    {{$item->ciudad}}
                @endforeach
            </h4>
        </div>
        @endforeach
    </div>

</body>
</html>