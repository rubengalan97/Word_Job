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
    <title>{{__('messages.business_manage')}}</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.business_manage')}}</a>
        <a href="{{route('admin.gestion')}}">{{__('messages.manages')}}</a>
        <a href="{{route('admin.usuarios')}}">{{__('messages.user_manage')}}</a>
        <a href="{{route('admin.ofertas')}}">{{__('messages.offers_manage')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="titulo">
        <h1>{{__('messages.business_manage')}}</h1>
    </div>

    <div id="tabla">
        <table>
            <thead>
                <th>{{__('messages.business_id')}}</th>
                <th>{{__('messages.business_name')}}</th>
                <th>{{__('messages.description')}}</th>
                <th colspan="2">{{__('messages.actions')}}</th>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                <tr>
                    <td>{{$empresa->idEmp}}</td>
                    <td>{{$empresa->nombre}}</td>
                    <td>{{$empresa->descripcion}}</td>
                    <td><a class="link" href="{{route('admin.editarEmpresaAdmin', $empresa)}}"><button class="editar">{{__('messages.edit')}}</button></a></td>
                    <td><a class="link" href="{{route('admin.borrarEmpresa', $empresa)}}"><button class="borrar">{{__('messages.delete')}}</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>