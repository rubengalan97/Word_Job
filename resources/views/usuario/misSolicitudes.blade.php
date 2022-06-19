<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <title>{{__('messages.requests')}}</title>
</head>
<body>


    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.requests')}}</a>
        <a href="{{route('usuario.perfil', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.profile')}}</a>
        <a href="{{route('usuario.ofertas')}}">{{__('messages.offers')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    @if ($solicitudes->count() == 0)
        <h3>No tienes solicitudes</h3>
    @else

    <div class="cards">
        @foreach ($solicitudes as $solicitud)
        <div class="card">
            <h2 class="titulos">
                @foreach ($solicitud->empresas() as $item)
                {{__('messages.business')}}: {{$item->nombre}}
                @endforeach
            </h2>
            <h3 class="titulos">{{__('messages.description')}}:</h3>
            <p class="descripcion">{{$solicitud->descripcion}}</p>
            <h4 class="titulos">{{__('messages.city')}}:</h4>
            <h4 class="titulos">
                @foreach ($solicitud->ciudades() as $item)
                    {{$item->ciudad}}
                @endforeach
            </h4>
            <h4 class="titulos">{{__('messages.status')}}:</h4>
            <h4 class="titulos">
                @foreach ($solicitud->solicitudes() as $item)
                    {{$solicitud->estado($item->pivot['idOfe'], $item->pivot['idUsu'])->estado}}
                @endforeach
            </h4>
            <a href="{{route('usuario.borrarSolicitud', ["idUsu" => Auth::user()->idUsu, "idOfe" => $solicitud->idOfe])}}"><button class="borrar">{{__('messages.delete_request')}}</button></a>
        </div>
        @endforeach
    </div>
    @endif
    
</body>
</html>