<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfil.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <title>Editar Oferta</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Editar Oferta</a>
        <a href="{{route('admin.gestion')}}">Gestiones</a>
        <a href="{{route('admin.empresas')}}">Gestionar Empresas</a>
        <a href="{{route('admin.usuarios')}}">Gestionar Usuarios</a>
        <a href="{{route('admin.ofertas')}}">Gestionar Ofertas</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="titulo">
        
    </div>

    <div class="container">
        <form action="{{route('admin.editandoOferta')}}" method="post">
            @csrf
            <input type="hidden" name="idOfe" value="{{$oferta->idOfe}}">
            <div class="row">
                <div class="col-25">
                    <label for="empresa">Selecciona Empresa</label>
                </div>
                <div class="col-75">
                    <select name="empresa">
                        @foreach ($empresas as $empresa)
                            @if ($empresa->idEmp == $oferta->idEmp)
                                <option value="{{$empresa->idEmp}}" selected>{{$empresa->nombre}}</option>
                            @else
                                <option value="{{$empresa->idEmp}}">{{$empresa->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
              </div>
            <div class="row">
                <div class="col-25">
                    <label for="descripcion">Descripcion</label>
                </div>
                <div class="col-75">
                    <textarea id="descripcion" name="descripcion" style="height:200px" >{{$oferta->descripcion}}</textarea>
                </div>
                <div class="col-25">
                    <label for="ciudad">Ciudad</label>
                </div>
                <div class="col-75">
                    <select name="ciudad">
                        @foreach ($ciudades as $ciudad)
                            @if ($ciudad->idCiu == $oferta->idCiu)
                                <option value="{{$ciudad->idCiu}}" selected>{{$ciudad->ciudad}}</option>
                            @else
                                <option value="{{$ciudad->idCiu}}">{{$ciudad->ciudad}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Editar">
            </div>
            </div>
        </form>
      </div>

</body>
</html>