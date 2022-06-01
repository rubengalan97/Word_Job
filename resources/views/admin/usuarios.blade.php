<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion Usuarios</title>
</head>
<body>

    <button><a href="{{route('admin.gestion')}}">Volver a Gestiones</a></button>

    <table>
        <thead>
            <th>id Usuario</th>
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
    
</body>
</html>