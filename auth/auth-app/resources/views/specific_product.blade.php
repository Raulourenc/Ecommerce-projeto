@component('layouts/_components/head_component')
@endcomponent
@component('layouts/_components/form_nav', ['a' => $_SESSION['rota']])
@endcomponent
@if(!empty($_SESSION['prod']) == true)
    <a class="nav-link" href="{{ $_SESSION['rota'] }}">Produtos</a>
@endif
</div>
    </div>
    <form class="input-group-welcome" action="{{ url($_SESSION['rota']) }}">
        <div class="input-group-welcome">
            <div class="input-group mb-3">
                <input type="search" name="search "class="form-control" placeholder="Pesquisar" >
                <button  class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div> 
        </div> 
    </form>
    <div class="icon-shop">
        <a href="" class="btn btn-lg"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>   
</nav>
<div class="container">
  <div class="row">
        <div class="col-6">
            <div class="card-big">
                @if($product['image'] != "")
                    @foreach (explode('public/',$product['image']) as $img)
                        <img class="img-sp" src="{{asset('storage/'.$img)}}" alt="">
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-5">
            <div class="description">
                <div class="title-prod"><h1 class="card-title">{{$product['name']}}</h1></div>
                <label><h4>Descrição</h4></label>
                {{$product['description']}}
                <label><h4>Quantidade Disponível</h4></label>
                {{$product['quantity']}} 
                <label><h4>Marca</h4></label>
                {{$providers['name']}} 
                <div class="title-prod"><h4 class="card-title">R$ {{$product['price']}},00</h4></div>
                <a href="" class="btn btn-secondary">Adicionar Item</a>                            
            </div> 
        </div>
  </div>
</div>
</body>
</html>
