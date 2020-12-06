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

  <!-- Link de Chart.js paragraficar -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


</head>

<body>

  <div class="main" id="app">
    @include('layouts.navbar')



    <div class="main" id="app">
      {{--  Mensaje de validacion exitosamente. Carpeta en views partials --}}
      @include('messages.session-status')
      {{-- endInclude --}}
    </div>

    @yield('content')


    @include('layouts.footer')
  </div>

</body>

{{-- Inint Grafic --}}
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
datasets: [{
label: '# of Votes',
data: [12, 19, 3, 5, 2, 3],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255, 99, 132, 1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});

</script>

<script type="module">

  import data from './data.js'
debugger
function totalCasesChart()
{

}

function renderCharts()
{
cons ctx = document.querySelector('#myChart').getContext('2d')
totalCasesChart(ctx)
}

renderCharts()
</script>


</html>