<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gestiones.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Gestion</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Gestion</a>
        <a href="{{route('admin.empresas')}}">Gestionar Empresas</a>
        <a href="{{route('admin.usuarios')}}">Gestionar Usuarios</a>
        <a href="{{route('admin.ofertas')}}">Gestionar Ofertas</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="principal">
        <div class="gestiones">
            <h3 class="titulos">Gestiones para las Empresas</h3>
            <ul>
                <li>Podras consultar todas las empresas</li>
                <li>Podras editar empresas</li>
                <li>Podras eliminar empresas</li>
            </ul>
        </div>
        <div class="gestiones">
            <h3 class="titulos">Gestiones para los usuarios</h3>
            <ul>
                <li>Podras consultar todos los usuarios</li>
                <li>Podras editar usuarios</li>
                <li>Podras eliminar usuarios</li>
            </ul>
        </div>
        <div class="gestiones">
            <h3 class="titulos">Gestiones para las Ofertas</h3>
            <ul>
                <li>Podras consultar todas las ofertas</li>
                <li>Podras editar ofertas</li>
                <li>Podras eliminar ofertas</li>
            </ul>
        </div>
    </div>
    
</body>
</html>