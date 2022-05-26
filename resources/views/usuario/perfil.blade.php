<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi perfil</title>
</head>
<body>
    <button><a href="{{route('usuario.editarPerfil', ["idUsu" => Auth::user()->idUsu])}}">Editar Perfil</a></button>
    <form>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="{{$usuario->email}}" disabled><br><br>
        <label for="imagen">Imagen</label><br>
        <input type="imagen" name="imagen" id="imagen" value="{{$usuario->imagen}}" disabled><br><br>
        <label for="ultimos_estudios">Ultimos Estudios</label><br>
        <input type="ultimos_estudios" name="ultimos_estudios" id="ultimos_estudios" value="{{$usuario->ultimos_estudios}}" disabled><br><br>
        <label for="descripcion">Descripcion</label><br>
        <input type="descripcion" name="descripcion" id="descripcion" value="{{$usuario->descripcion}}" disabled>
    </form>
</body>
</html>