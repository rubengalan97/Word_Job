<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perfil del usuario {{$usuario->email}}</title>
</head>
<body>


    <form action="#">

        <label for="email">Email</label><br>
        <input type="text" name="email" value="{{$usuario->email}}" disabled><br><br>
        <label for="ultimos_estudios">Ultimos estudios</label><br>
        <textarea name="ultimos_estudios" rows="10" cols="50" disabled>{{$usuario->ultimos_estudios}}</textarea><br><br>
        <label for="descripcion">Descripcion</label><br>
        <textarea name="descripcion" rows="10" cols="50" disabled>{{$usuario->descripcion}}</textarea><br><br>

    </form>
 
</body>
</html>