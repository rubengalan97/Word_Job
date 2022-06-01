<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Ofertas</title>
</head>
<body>

    <button><a href="{{route('admin.gestion')}}">Volver a Gestiones</a></button>

    <table>
        <thead>
            <th>Nombre Empresa</th>
            <th>Descripcion</th>
            <th>Ciudad</th>
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
                <td><button><a href="{{route('admin.editarOferta', $oferta)}}">Editar</a></button></td>
                <td><button><a href="{{route('admin.borrarOferta', $oferta)}}">Borrar</a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>