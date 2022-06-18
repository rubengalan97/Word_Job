<!DOCTYPE html>
<html lang="en">
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
        <a href="#" class="active">Gestionar Ofertas</a>
        <a href="{{route('admin.gestion')}}">Gestiones</a>
        <a href="{{route('admin.usuarios')}}">Gestionar Usuarios</a>
        <a href="{{route('admin.empresas')}}">Gestionar Empresas</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="titulo">
        <h1>Gestion de Ofertas</h1>
    </div>

    <div id="tabla">
        <table>
            <thead>
                <th>Nombre Empresa</th>
                <th>Descripcion</th>
                <th>Ciudad</th>
                <th colspan="2">Acciones</th>
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
                    <td><a class="link" href="{{route('admin.editarOferta', $oferta)}}"><button class="editar">Editar</button></a></td>
                    <td><a class="link" href="{{route('admin.borrarOferta', $oferta)}}"><button class="borrar">Borrar</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>