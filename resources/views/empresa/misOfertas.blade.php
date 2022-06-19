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
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>{{__('messages.offers')}}</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.offers')}}</a>
        <a href="{{route('empresa.perfil', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.profile')}}</a>
        <a href="{{route('empresa.crearOferta', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.create_offer')}}</a>
        <a href="{{route('empresa.solicitudesEmpresa')}}">{{__('messages.requests')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="cards">
        @foreach ($ofertas as $oferta)
        <div class="card">
            <h2 class="titulos">
                @foreach ($oferta->empresas() as $item)
                {{__('messages.business')}}: {{$item->nombre}}
                @endforeach
            </h2>
            <h3 class="titulos">{{__('messages.description')}}:</h3>
            <p class="descripcion">{{$oferta->descripcion}}</p>
            <h4 class="titulos">{{__('messages.city')}}:</h4>
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