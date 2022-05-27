<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Empresas</title>
</head>
<body>

    <table>
        <thead>
            <th>id Empresa</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripcion</th>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
            <tr>
                <td>{{$empresa->idEmp}}</td>
                <td>{{$empresa->nombre}}</td>
                <td>{{$empresa->imagen}}</td>
                <td>{{$empresa->descripcion}}</td>
                <td><button><a href="{{route('admin.editarEmpresa', $empresa)}}">Editar</a></button></td>
                <td><button><a href="{{route('admin.borrarEmpresa', $empresa)}}">Borrar</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>