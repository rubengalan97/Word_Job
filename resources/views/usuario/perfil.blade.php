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
    <title>Mi perfil</title>
</head>
<body>

        <div class="topnav" id="myTopnav">
            <a href="#" class="active">Mi perfil</a>
            <a href="{{route('usuario.editarPerfil', ["idUsu" => Auth::user()->idUsu])}}">Editar Perfil</a>
            <a href="{{route('usuario.borrarPerfil', ["idUsu" => Auth::user()->idUsu])}}">Borrar Perfil</a>
            <a href="{{route('usuario.ofertas')}}">Ofertas</a>
            <a href="{{route("out")}}">Log out</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
        </div>
        
        <div class="img">
            <img id="perfilImagen" src="{{ asset('img/'.$usuario->imagen.'') }}" alt="Imagen usuario">
        </div>
        
        <div class="container">
          <form>
            <div class="row">
              <div class="col-25">
                <label for="email">Email</label>
              </div>
              <div class="col-75">
                <input type="email" name="email" id="email" value="{{$usuario->email}}" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="imagen">Imagen</label>
              </div>
              <div class="col-75">
                <input type="text" name="imagen" id="imagen" value="{{$usuario->imagen}}" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="ultimos_estudios">Ultimos Estudios</label>
              </div>
              <div class="col-75">
                <textarea id="ultimos_estudios" name="ultimos_estudios" readonly style="height:200px">{{$usuario->ultimos_estudios}}</textarea>
              </div>
              <div class="col-25">
                <label for="descripcion">Descripcion</label>
              </div>
              <div class="col-75">
                <textarea id="descripcion" name="descripcion" readonly style="height:200px">{{$usuario->descripcion}}</textarea>
              </div>
            </div>
          </form>
        </div>

</body>
</html>