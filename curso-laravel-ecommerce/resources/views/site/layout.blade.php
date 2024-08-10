<?php
use Darryldecode\Cart\Facades\CartFacade;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    {{-- DropDown Code --}}
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaMenu)
            <li><a href="{{route('site.categoria', $categoriaMenu->id)}}">{{$categoriaMenu->nome}}</a></li>
        @endforeach
    </ul>
    <ul id='dropdown2' class='dropdown-content'>
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('login.logout')}}">Sair</a></li>
    </ul>

    <nav class="red">
        <div class="nav-wrapper container">
            <a href="{{route('site.index')}}" class="brand-logo center">Node Shop</a>
            <ul id="nav-mobile" class="left">
                <li><a href="{{route('site.index')}}">Home</a></li>
                <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Categorias <i class="material-icons right">expand_more</i></a></li>
                <li><a href="{{route('site.carrinho')}}">Carrinho <span class="new badge blue" data-badge-caption="">{{CartFacade::getContent()->count()}}</span></a></li>
            </ul>

            <ul id="nav-mobile" class="right">
            @auth
                <li><a class='dropdown-trigger' href='#' data-target='dropdown2'>Olá {{auth()->user()->firstName}}<i class="material-icons right">expand_more</i></a></li>
                @else
                <li><a class='dropdown' href='{{route('login.form')}}'>Entrar</a></li>
            @endauth
            </ul>
        </div>
    </nav>

    @include('messages.message')

    @yield('conteudo')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>
</body>
</html>