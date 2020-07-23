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
</head>

<body>
  <div id="app">

    <nav class="navbar navbar-expand-md navbar-danger 
    bg-secondary shadow-sm">



      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>



        <ul class="navbar-nav ml-auto text-decoration-none">
          <li>
            <a href="#" class="link text-decoration-none text-dark font-">CACHETEROS</a>
          </li>
          <li class="palito">|</li>
          <li>
            <a href="" class="link text-decoration-none text-dark">
              COLLARES
            </a>
          </li>
          <li class="palito">|</li>
          <li>
            <a href="#" class="link text-decoration-none text-dark">
              ARETES
            </a>
          </li>
          <li class="palito">|</li>
          <li>
            <a href="#" class="link text-decoration-none text-dark">
              CAMISAS
            </a>
          </li>
          <li class="palito">|</li>
          <li>
            <a href="#" class="link text-decoration-none text-dark">
              PANTALONES
            </a>
          </li>

        </ul>


        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href="{{ route('products') }}">{{ __('productos') }}</a>
          </li>

          @auth
          @if (Auth::user()->is_admin)

          <li class="nav-item">
            <a class="nav-link" href="{{ route('User') }}">{{ __('usuarios') }}</a>
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

  <main class="py-4">
    @yield('content')
  </main>
  </div>

  <!--Footer-->
  <footer id="footer" class="foo pb-4 pt-4 bg-dark" style=": 18rem >
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