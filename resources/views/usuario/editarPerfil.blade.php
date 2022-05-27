<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Perfil</title>
</head>
<body>
    <button><a href="{{route('usuario.perfil', ["idUsu" => Auth::user()->idUsu])}}">Mi perfil</a></button>
    <button><a href="{{route('usuario.ofertas')}}">Ofertas</a></button>
    
    <form action="{{route('usuario.guardarPerfil', ["idUsu" => Auth::user()->idUsu])}}" method="post">
        @csrf
        <label for="imagen">Imagen</label><br>
        <input type="imagen" name="imagen" id="imagen" value="{{$usuario->imagen}}" ><br><br>
        <label for="ultimos_estudios">Ultimos Estudios</label><br>
        <input type="ultimos_estudios" name="ultimos_estudios" id="ultimos_estudios" value="{{$usuario->ultimos_estudios}}" ><br><br>
        <label for="descripcion">Descripcion</label><br>
        <input type="descripcion" name="descripcion" id="descripcion" value="{{$usuario->descripcion}}" ><br><br>
        <input type="submit" value="Enviar">

    </form>
    
</body>
</html>