<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/de25909b6f.js" crossorigin="anonymous" defer></script>
  {{-- Para que me tome los icosnos de fontawesome y se le pone el defer para que el crip se ejecute al final de la pagina --}}
</head>

<body>
  <div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark 
    bg-dark"> {{-- Aqui cambio el color del navbar y las letras se cambian solas --}}



      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="active" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon">yoimar</span>
        </button>


        <ul id="navbarSupportedContent" class="navbar-nav navbar-expand-lg ml-auto text-secondary text-decoration-none">
          <li class="nav-item">
            <div class="btn-group" role="group ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarObras" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Obras</a>

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
              <a class="nav-link dropdown-toggle" href="#" id="navbarArtistas" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarColecciones" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
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
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </ul>
      </div>
  </div>
  </nav>

  {{--  Mensaje de validacion exitosamente. Carpeta en views partials --}}
  <div class="include-messages text-center mt-2 text-success">
    <h5>@include('messages.session-status')</h5>
  </div>
  {{-- endInclude --}}

  @yield('content')

  </div>

  <!--Footer-->
  <footer id="footer" class="foo pb-4 pt-4 bg-dark d-flex mt-3" style=": 18rem ">
    <div class=" container">
      <div class="row text-center">
        <div class="col-12 col-lg">
          <a href="#">Preguntas frecuentes</a>
        </div>

        <div class="col-12 col-lg">
          <a href="#">Contáctanos</a>
        </div>
        <div class="col-12 col-lg">
          <a href="#">Prensa</a>
        </div>

        <div class="col-12 col-lg">
          <a href="#">Conferencias</a>
        </div>
        <div class="col-12 col-lg">
          <a href="#">Terminos y condiciones</a>
        </div>
        <div class="col-12 col-lg">
          <a href="#">Privacidad</a>
        </div>
      </div>
    </div>
  </footer>


</body>

</html>