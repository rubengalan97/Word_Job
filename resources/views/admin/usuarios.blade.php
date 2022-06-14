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
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Gestion Usuarios</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Gestionar Usuarios</a>
        <a href="{{route('admin.gestion')}}">Gestiones</a>
        <a href="{{route('admin.empresas')}}">Gestionar Empresas</a>
        <a href="{{route('admin.ofertas')}}">Gestionar Ofertas</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="titulo">
        <h1>Gestion de Usuarios</h1>
    </div>

    <div id="tabla">
        <table>
            <thead>
                <th>Id Usuario</th>
                <th>Email</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Ultimos Estudios</th>
                <th>Rol</th>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->idUsu}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->imagen}}</td>
                    <td>{{$usuario->descripcion}}</td>
                    <td>{{$usuario->ultimos_estudios}}</td>
                    <td>{{$usuario->rol}}</td>
                    <td><button><a href="{{route('admin.editarUsuario', $usuario)}}">Editar</a></button></td>
                    <td><button><a href="{{route('admin.borrarUsuario', $usuario)}}">Borrar</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>