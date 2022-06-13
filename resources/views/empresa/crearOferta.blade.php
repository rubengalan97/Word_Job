<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear ofertas</title>
</head>
<body>

    <form action="{{route("empresa.creandoOferta")}}" method="post">
        @csrf
        <input type="hidden" name="idEmp" id="idEmp" value="{{$empresa->idEmp}}"><br><br>
        <label for="descripcion">Descripcion oferta</label><br><br>
        <textarea name="descripcion" rows="10" cols="50"></textarea><br><br>
        <label for="ciudad">Ciudad</label><br>
        <select name="ciudad">
            @foreach ($ciudades as $ciudad)
                 <option value="{{$ciudad->idCiu}}">{{$ciudad->ciudad}}</option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Crear">
    </form>
    
</body>
</html>