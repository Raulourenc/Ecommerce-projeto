@component('layouts/_components/head_component')
@endcomponent
@component('layouts/_components/form_nav', ['a' => $_SESSION['rota']])
@endcomponent
</div>
    </div>
        <form class="input-group-welcome" action="">
            <div class="input-group-welcome">
                <div class="input-group mb-3">
                    <input type="search" name="search "class="form-control" placeholder="Pesquisar" >
                    <button  class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div> 
            </div> 
        </form>
    <div class="login-container">
        <form action="{{ Route('logout')}}" method="GET">
            <button class="btn btn-secondary" type="submit">Sair</button>
        </form>
    </div>
@component('layouts/_components/home_component', ['products' => $products])
@endcomponent
