<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminTable.css') }}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/botones.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Gestion Ofertas</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.offers_manage')}}</a>
        <a href="{{route('admin.gestion')}}">{{__('messages.manages')}}</a>
        <a href="{{route('admin.usuarios')}}">{{__('messages.user_manage')}}</a>
        <a href="{{route('admin.empresas')}}">{{__('messages.business_manage')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="titulo">
        <h1>{{__('messages.offers_manage')}}</h1>
    </div>

    <div id="tabla">
        <table>
            <thead>
                <th>{{__('messages.business_name')}}</th>
                <th>{{__('messages.description')}}</th>
                <th>{{__('messages.city')}}</th>
                <th colspan="2">{{__('messages.actions')}}</th>
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
                    <td><a class="link" href="{{route('admin.editarOferta', $oferta)}}"><button class="editar">{{__('messages.edit')}}</button></a></td>
                    <td><a class="link" href="{{route('admin.borrarOferta', $oferta)}}"><button class="borrar">{{__('messages.delete')}}</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>