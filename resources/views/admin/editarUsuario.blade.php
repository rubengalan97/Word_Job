<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar usuario</title>
</head>
<body>

    <form action="{{route('admin.editandoUsuario')}}" method="post">
        @csrf
        <input type="hidden" name="idUsu" value="{{$usuario->idUsu}}"><br><br>
        <label for="email">Email</label><br><br>
        <input type="email" name="email" id="email" value="{{$usuario->email}}"><br><br>
        <label for="imagen">Imagen</label><br><br>
        <input type="text" name="imagen" id="imagen" value="{{$usuario->imagen}}"><br><br>
        <label for="ultimos_estudios">Ultimos Estudios</label><br><br>
        <input type="text" name="ultimos_estudios" id="ultimos_estudios" value="{{$usuario->ultimos_estudios}}"><br><br>
        <label for="descripcion">Descripcion</label><br><br>
        <input type="text" name="descripcion" id="descripcion" value="{{$usuario->descripcion}}"><br><br>
        <label for="rol">Rol</label><br><br>
        <select name="rol" id="rol">
            <option value="usuario">Usuario</option>
            <option value="empresa">Empresa</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <input type="submit" value="Editar">
    </form>
    
</body>
</html>