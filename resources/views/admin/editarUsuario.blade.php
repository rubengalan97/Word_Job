<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfil.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Editar Usuario</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.edit_user')}}</a>
        <a href="{{route('admin.gestion')}}">{{__('messages.manages')}}</a>
        <a href="{{route('admin.empresas')}}">{{__('messages.business_manage')}}</a>
        <a href="{{route('admin.usuarios')}}">{{__('messages.user_manage')}}</a>
        <a href="{{route('admin.ofertas')}}">{{__('messages.offers_manage')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="img">
        <img id="perfilImagen" src="{{ asset('img/'.$usuario->imagen.'') }}" alt="Imagen usuario">
    </div>

    <div class="container">
        <form action="{{route('admin.editandoUsuario')}}" method="post">
            @csrf
            <input type="hidden" name="idUsu" value="{{$usuario->idUsu}}">
            <div class="row">
                <div class="col-25">
                  <label for="email">{{__('messages.email')}}</label>
                </div>
                <div class="col-75">
                  <input type="email" name="email" id="email" value="{{$usuario->email}}" >
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="imagen">{{__('messages.img')}}</label>
                </div>
                <div class="col-75">
                  <input type="file" name="imagen" id="imagen" value="{{$usuario->imagen}}" >
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="ultimos_estudios">{{__('messages.studies')}}</label>
                </div>
                <div class="col-75">
                  <textarea id="ultimos_estudios" name="ultimos_estudios" style="height:200px" >{{$usuario->ultimos_estudios}}</textarea>
                </div>
                <div class="col-25">
                  <label for="descripcion">{{__('messages.description')}}</label>
                </div>
                <div class="col-75">
                <textarea id="descripcion" name="descripcion" style="height:200px" >{{$usuario->descripcion}}</textarea>
                </div>
                <div class="col-25">
                    <label for="rol">Rol</label>
                </div>
                <div class="col-75">
                    <select name="rol" id="rol">
                        <option value="usuario">Usuario</option>
                        <option value="empresa">Empresa</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                </div>
                <div class="row">
                    <input type="submit" value="{{__('messages.edit')}}">
                  </div>
              </div>
        </form>
      </div>
    
</body>
</html>