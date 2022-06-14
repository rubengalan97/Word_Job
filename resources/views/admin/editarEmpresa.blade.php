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
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Editar Empresa</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Editar Empresa</a>
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
        <form action="{{route('admin.editandoEmpresa')}}" method="post">
            @csrf
            <input type="hidden" name="idEmp" value="{{$empresa->idEmp}}">
            <div class="row">
                <div class="col-25">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nombre" id="nombre" value="{{$empresa->nombre}}">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="imagen">Imagen</label>
                </div>
                <div class="col-75">
                  <input type="file" name="imagen" id="imagen" value="{{$empresa->imagen}}" >
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="descripcion">Descripcion</label>
                </div>
                <div class="col-75">
                <textarea id="descripcion" name="descripcion" style="height:200px" >{{$empresa->descripcion}}</textarea>
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