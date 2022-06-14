<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfil.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Crear oferta</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Editar Perfil</a>
        <a href="{{route('empresa.perfil')}}">Perfil</a>
        <a href="{{route('empresa.misOfertas')}}">Mis Ofertas</a>
        <a href="{{route('empresa.solicitudesEmpresa')}}">Solicitudes</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="img">
        <img id="perfilImagen" src="{{ asset('img/'.$usuario->imagen.'') }}" alt="Imagen usuario">
    </div>

    <div class="container">
        <form action="{{route('empresa.editandoEmpresaUsuario')}}" method="post">
            @csrf
            <input type="hidden" name="idEmp" id="idEmp" value="{{$empresa->idEmp}}" >
            <input type="hidden" name="idUsu" id="idUsu" value="{{$usuario->idUsu}}" >
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" name="email" id="email" value="{{$usuario->email}}" >
                </div>
            </div>
                <div class="row">
                <div class="col-25">
                    <label for="imagen">Imagen</label>
                </div>
                <div class="col-75">
                    <input type="file" name="imagen" id="imagen" value="{{$usuario->imagen}}" >
                </div>
                </div>
                <div class="row">
                <div class="col-25">
                    <label for="imagen">Nombre Empresa</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nombre" id="nombre" value="{{$empresa->nombre}}" >
                </div>
                </div>
                <div class="row">
                <div class="col-25">
                    <label for="descripcion">Descripcion</label>
                </div>
                <div class="col-75">
                    <textarea id="descripcion" name="descripcion" readonly style="height:200px">{{$empresa->descripcion}}</textarea>
                </div>
                </div>
                <div class="row">
                    <input type="submit" value="Editar">
                </div>
        </form>
      </div>
    
</body>
</html>