       <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a href="{{ $a }}" class="navbar-brand">
                    <img href="{{ $a }}"  class="d-inline-block align-text-top">
                        WhiteBag
                </a>
                <a class="nav-link" href="{{ $a }}">Home</a>
                <a class="nav-link" href="{{ Route('Category.index') }}">Categorias</a>
                 @if(isset($_SESSION['id']) == false)
                <a class="nav-link" href="{{ Route('Address.index') }}">Cadastrar</a>
                @else  
                 <a class="nav-link" href="{{ Route('Address.index') }}">Cadastro</a>
                 @endif
    