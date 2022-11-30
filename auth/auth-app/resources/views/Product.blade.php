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
<body style="background-color:#e4dcca">
     <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
            @component('layouts/_components/form_nav', ['a' => $_SESSION['rota']])
            @endcomponent
             @if(isset($_SESSION['prod']) == true)
                <a class="nav-link" href="{{ $_SESSION['rota'] }}">Produtos</a>
            @endif
          </div>
        </div>
            <form class="input-group-welcome" action="{{ url($_SESSION['rota'])}}">
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
    </nav>
    @if(session('msg'))
        <div class="alert alert-dark" >
            <p>{{session('msg')}}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <form action="{{ Route('Products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                
                    <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    @if($errors->has('name'))
                        {{$errors->first('name')}}
                    @endif

                    <div class="input-group mb-3">
                    <input type="text" name="price" class="form-control" placeholder="Preço" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    @if($errors->has('price'))
                        {{$errors->first('price')}}
                    @endif

                    <div class="input-group mb-3">
                    <input type="file" id="image" name="image" class="form-control" placeholder="Imagem" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    @if($errors->has('image'))
                        {{$errors->first('image')}}
                    @endif

                    <div class="input-group mb-3">
                    <input type="text" name="description" class="form-control" placeholder="Descrição" aria-label="Recipient's username" aria-describedby="button-addon2">
                    
                    </div>
                    @if($errors->has('description'))
                        {{$errors->first('description')}}
                    @endif
                    
                    <div class="input-group mb-3">
                    <input type="text" name="quantity" class="form-control" placeholder="Quantidade" aria-label="Recipient's username" aria-describedby="button-addon2">
                    
                    </div>
                    @if($errors->has('quantity'))
                        {{$errors->first('quantity')}}
                    @endif

                    <div class="input-group mb-3">
                        <select class="form-select" name="category_id" aria-label="Disabled select example" >
                            <option selected>Categorias</option>
                            @foreach ($categories as $category)
                                <option  value="{{$category->id}}" {{ old('category_id') == $category->categorie ? 'selected' : ''}}>{{$category->categorie}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('category_id'))
                        {{$errors->first('category_id')}}
                    @endif

                    <div class="input-group mb-3">
                        <select class="form-select" name="provider_id" aria-label="Disabled select example" >
                            <option selected>Fornecedor</option>
                            @foreach ($providers as $provider)
                                <option  value="{{$provider->id}}" {{ old('provider_id') == $provider->name ? 'selected' : ''}}>{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($errors->has('provider_id'))
                        {{$errors->first('provider_id')}}
                    @endif
                </div>
                <div class="button-sub">
                    <button class="btn btn-secondary" type="submit">Cadastrar</button>
                </div>
            </form>
         </div>
    </div>
</body>
</html>