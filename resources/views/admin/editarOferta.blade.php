<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Oferta</title>
</head>
<body>

    <form action="{{route('admin.editandoOferta')}}" method="post">
        @csrf
        <input type="hidden" name="idOfe" value="{{$oferta->idOfe}}">
        <label for="empresa">Selecciona Empresa</label><br>
        <select name="empresa">
            @foreach ($empresas as $empresa)
                @if ($empresa->idEmp == $oferta->idEmp)
                    <option value="{{$empresa->idEmp}}" selected>{{$empresa->nombre}}</option>
                @else
                    <option value="{{$empresa->idEmp}}">{{$empresa->nombre}}</option>
                @endif
            @endforeach
        </select><br><br>
        <label for="descripcion">Descripcion</label><br>
        <textarea name="descripcion" rows="10" cols="50">{{$oferta->descripcion}}</textarea><br><br>
        <label for="ciudad">Ciudad</label><br>
        <select name="ciudad">
            @foreach ($ciudades as $ciudad)
                @if ($ciudad->idCiu == $oferta->idCiu)
                    <option value="{{$ciudad->idCiu}}" selected>{{$ciudad->ciudad}}</option>
                @else
                    <option value="{{$ciudad->idCiu}}">{{$ciudad->ciudad}}</option>
                @endif
            @endforeach
        </select><br><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>