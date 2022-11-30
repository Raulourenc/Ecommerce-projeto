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
        @if(isset($_SESSION['email']) == false)
        @else
        <a class="nav-link" href="{{ Route('Products.index') }}">Produtos</a>
        @endif
              </div>
        </div>
        <form class="input-group-welcome" action="{{ Route('index')}}">
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
            @foreach($products as $product)
                    <div class="col-3 mb-3">
                        <div class="card">
                            @if($product->image != "")
                                @foreach (explode('public/',$product->image) as $image)
                                    <img src="{{ asset('storage/'.$image) }}" class="card-img-top" alt="">
                                @endforeach
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{$product->name}}</h4>
                                <h4 class="card-title">R$ {{$product->price}},00</h4>
                                <a href="#" class="btn btn-secondary">Adicionar Item</a>                            
                            </div>
                        </div>
                    </div>     
            @endforeach
        </div>
    </div>
    <div class="">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
</body>
</html>