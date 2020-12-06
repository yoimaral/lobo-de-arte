<div class="fixed-top">

    <nav class="navbar navbar-expand-lg navbar-dark 
    bg-dark">

        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="active"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon">yoimar</span>
            </button>


            <ul id="navbarSupportedContent"
                class="navbar-nav navbar-expand-lg ml-auto text-secondary text-decoration-none">
                <li class="nav-item">
                    <div class="btn-group" role="group ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarObras" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Obras</a>

                        <div class="dropdown-menu" aria-labelledby="navbarObras">
                            <a class="dropdown-item" href="#">Pintura</a>
                            <a class="dropdown-item" href="#">Escultura</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Foto grafia</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="btn-group" role="group ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarArtistas" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Artistas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarArtistas">
                            <a class="dropdown-item" href="#">Pintores</a>
                            <a class="dropdown-item" href="#">Fotógrafos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Escultores</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="btn-group" role="group ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarColecciones" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Colecciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarColecciones">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Inspirado por...</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Últimas colecciones</a>

                            {{-- PENDIENTE --}}
                            <picture>
                                <img src="/images/14.jpg">
                            </picture>
                            {{-- END --}}
                        </div>
                    </div>
                </li>
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">{{ __('Pedidos') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('order.report')}}">{{ __('Generar reportede ventas') }}</a>
                </li>

                @auth
                @if (Auth::user()->is_admin)

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">{{ __('Products') }}</a>
                </li>

                @endif
                @endauth
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a href="{{ route('users.show', Auth::user())}}"
                            class="dropdown-item">{{ __('Mi profile') }}</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                <li class="nav-item">
                    @inject('cartService', 'App\Services\CartService')
                    <a class="nav-link" href="{{ route('carts.index') }}"> Cart ({{ $cartService->countProducts()}})</a>
                </li>
            </ul>
        </div>
</div>
</nav>



</div>