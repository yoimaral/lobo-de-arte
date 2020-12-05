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

  @include('layouts.navbar')



  <div class="main" id="app">
    {{--  Mensaje de validacion exitosamente. Carpeta en views partials --}}
    @include('messages.session-status')
    {{-- endInclude --}}
    @yield('content')
  </div>

  @include('layouts.footer')

</body>

</html>