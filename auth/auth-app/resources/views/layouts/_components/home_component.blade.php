        <div class="icon-shop">
            <a href="" class="btn btn-lg"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>   
    </nav>
    @if(session('msg'))
    <div class="alert alert-dark" >
        <p>{{session('msg')}}</p>
    </div>
    @endif
    <div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-3 mb-3">
            <a class="a-card" href="{{Route('Products.show', $product->id)}}">
                <div class="card">
                    @if($product->image != "")
                        @foreach (explode('public/',$product->image) as $image)
                            <img  src="{{ asset('storage/'.$image) }}" class="card-img-top" alt="">
                        @endforeach
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <pre>
                        <h4 class="card-title">R$ {{$product->price}},00</h4>
                        <a href="{{Route('Products.show', $product->id)}}" class="btn btn-secondary">Adicionar Item</a>                            
                    </div>
                </div> 
            </a>
            </div>
        @endforeach
        <div class="">
        {{$products->links('pagination::bootstrap-4')}}
        </div>
    </div>
</body>
</html>