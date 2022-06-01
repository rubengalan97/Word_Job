<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Empresa</title>
</head>
<body>

    <form action="{{route('admin.editandoEmpresa')}}" method="post">
        @csrf
        <input type="hidden" name="idEmp" value="{{$empresa->idEmp}}"><br><br>
        <label for="nombre">Nombre</label><br><br>
        <input type="text" name="nombre" id="nombre" value="{{$empresa->nombre}}"><br><br>
        <label for="imagen">Imagen</label><br><br>
        <input type="text" name="imagen" id="imagen" value="{{$empresa->imagen}}"><br><br>
        <label for="descripcion">Descripcion</label><br>
        <input type="text" name="descripcion" id="descripcion" value="{{$empresa->descripcion}}"><br><br>
        <input type="submit" value="Editar">
    </form>
    
</body>
</html>