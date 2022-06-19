<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfil.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>{{__('messages.create_offer')}}</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.create_offer')}}</a>
        <a href="{{route('empresa.perfil', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.profile')}}</a>
        <a href="{{route('empresa.misOfertas')}}">{{__('messages.offers')}}</a>
        <a href="{{route('empresa.solicitudesEmpresa')}}">{{__('messages.requests')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="titulo">
        <h1 >{{__('messages.create_offer')}}</h1>
    </div>
    

    <div class="container">
        <form action="{{route("empresa.creandoOferta")}}" method="post">
            @csrf
            <input type="hidden" name="idEmp" id="idEmp" value="{{$empresa->idEmp}}">
            <div class="row">
                <div class="col-25">
                  <label for="subject">{{__('messages.description')}}</label>
                </div>
                <div class="col-75">
                  <textarea id="descripcion" name="descripcion" placeholder="Describir oferta.." style="height:200px"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="ciudad">{{__('messages.city')}}</label>
                </div>
            <div class="col-75">
                <select name="ciudad">
                    @foreach ($ciudades as $ciudad)
                         <option value="{{$ciudad->idCiu}}">{{$ciudad->ciudad}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="row">
            <input type="submit" value="Crear Oferta">
          </div>
        </form>
      </div>
    
</body>
</html>