<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyShop - Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('{{ asset('storage/fundo.jpg') }}')">
   <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
                @component('layouts/_components/form_nav', ['a' => $_SESSION['rota']])
                @endcomponent
                @if($_SESSION['email'] == false)
                @else
                    <a class="nav-link" href="{{ Route('Products.index') }}">Produtos</a>
                @endif
            </div>
        </div>
            <form class="input-group-welcome" action="{{$_SESSION['rota']}}">
                <div class="input-group-welcome">
                    <div class="input-group mb-3">
                        <input type="search" name="search "class="form-control" placeholder="Pesquisar" >
                        <button  class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div> 
                </div> 
            </form>
        </div> 
        <div class="icon-shop">
            <a href="#" class="btn btn-lg"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>   
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-4 mb-4">
                <a class="a-text-card" href="{{ Route('Category.show', 3) }}">
                    <div class="card">
                        <img src="{{ asset('storage/calças.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h1 class="card-title" style=" text-align:center">Calças</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 mb-4">
                <a class="a-text-card" href="{{ Route('Category.show', 1) }}">
                    <div class="card">
                        <img src="{{ asset('storage/camisetas.jpg') }}"  class="card-img-top" alt="">
                        <div class="card-body">
                            <h1 class="card-title" style=" text-align:center">Camisetas</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 mb-4">
                <a class="a-text-card" href="{{ Route('Category.show', 4) }}">
                    <div class="card">
                        <img src="{{ asset('storage/shorts.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h1 class="card-title" style=" text-align:center">Shorts</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 mb-4">
                <a class="a-text-card" href="{{ Route('Category.show', 6) }}">
                    <div class="card">
                        <img src="{{ asset('storage/tenis.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h1 class="card-title" style=" text-align:center">Tênis</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 mb-4">
                <a class="a-text-card" href="{{ Route('Category.show', 5) }}">
                    <div class="card">
                        <img src="{{ asset('storage/chinelos.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h1 class="card-title" style=" text-align:center">Chinelos</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4 mb-4">
                <a class="a-text-card" href="{{ Route('Category.show', 7) }}">
                    <div class="card">
                        <img src="{{ asset('storage/blusas.jpg') }}"  class="card-img-top" alt="">
                        <div class="card-body">
                            <h1 class="card-title" style=" text-align:center">Blusas</h1>
                        </div>
                    </div>
                </a>    
            </div>
        </div>
    </div>
</body>
</html>