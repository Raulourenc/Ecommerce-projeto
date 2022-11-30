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
              </div>
        </div>
           <form class="input-group-welcome" action="{{$_SESSION['rota']}}">
                <div class="input-group-welcome">
                    <div class="input-group mb-3">
                        <input type="search" name="search "class="form-control" placeholder="Pesquisar">
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
        <h2>Cadastro</h2>
        <div class="row">
        <form action="{{ Route('Address.store')}}" method="POST">
            @csrf
            <div class="">
                <div class="input-group mb-3">
                <input type="text" value="{{ old('login')}}" name="login" class="form-control" placeholder="Nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('login'))
                    {{$errors->first('login')}}
                @endif

                <div class="input-group mb-3">
                <input type="text" value="{{ old('email')}}" name="email" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('email'))
                    {{$errors->first('email')}}
                @endif

                <div class="input-group mb-3">
                <input type="text" value="{{ old('password')}}" name="password" class="form-control" placeholder="Senha" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('password'))
                    {{$errors->first('password')}}
                @endif

                <div class="input-group mb-3">
                <input type="text" value="{{ old('address')}}" name="address" class="form-control" placeholder="Endereço" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('address'))
                    {{$errors->first('address')}}
                @endif
                
                <div class="input-group mb-3">
                <input type="text" value="{{ old('number')}}" name="number" class="form-control" placeholder="número" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('number'))
                    {{$errors->first('number')}}
                @endif

                <div class="input-group mb-3">
                <input type="text" value="{{ old('complement')}}" name="complement" class="form-control" placeholder="Complemento" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('complement'))
                    {{$errors->first('complement')}}
                @endif

                <div class="input-group mb-3">
                <input type="text" value="{{ old('city')}}" name="city" class="form-control" placeholder="Cidade" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                @if($errors->has('city'))
                    {{$errors->first('city')}}
                @endif
            
                <div class="input-group mb-3">
                    <select class="form-select"  name="state" aria-label="Disabled select example" >
                        <option selected>Estado</option>
                        @foreach($states as $state)
                        <option  value="{{$state->states}}" {{ old('state') == $state->states ? 'selected' : ''}}>{{$state->states}}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('state'))
                    {{$errors->first('state')}}
                @endif
               
               <div class="form-check">
                <input  name ="admin" class="form-check-input" type="checkbox" value="true">
                <label class="form-check-label" for="flexCheckDefault">
                    Admin
                </label>
                </div>
            </div>
            <div class="button-sub">
                <button class="btn btn-secondary" type="submit">Cadastrar</button>
            </div>  
         </form>
    </div>
</body>
</html>


