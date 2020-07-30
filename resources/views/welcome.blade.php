<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>

  @extends('layouts.app')

  @section('content')

  <div class="content bg-witch">
    <div class=" title m-b-md">
      <a class="text-decoration-none" href=""> Welcom Lobo De Arte</a>
    </div>

    <div class="links text-warning">
      <a href="https://laravel.com/docs">Productos</a>
      <a href="https://laracasts.com">Artistas</a>
      <a href="https://laravel-news.com">Arte Anime</a>
      <a href="https://blog.laravel.com">Contáctanos</a>
      <a href="https://nova.laravel.com">Carrito</a>
      <a href="https://forge.laravel.com">Terminos y condiciones</a>
      <a href="https://github.com/laravel/laravel">GitHub</a>
    </div>
  </div>

  <!--MAIN-CAROUSEL-->
  <main>

    <div class="carousel slide carousel-fade" data-ride="carousel" data-paus="false">

      <div class="carousel-inner">

        <div class="carousel-item  active" data-interval="10000">
          <img class="img d-block w-100" src="/images/Abanero.jpg" alt="...">
        </div>

        <div class="carousel-item" data-interval="20000">
          <img class="img d-block w-100" src="/images/graffiti.jpg" alt="...">
        </div>

        <div class="carousel-item" data-interval="10000">
          <img class="img d-block w-100" src="/images/guess.jpg" alt="...">
        </div>

        <div class="overlay">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 offset-md-6 text-md-right">
                <!-- md de pantallas medianas 992px -->
                <h1>Plazi Con Hawai</h1>
                <p class="d-none d-md-block">Plazi conf llega por primera vez a haway un evento para
                  compartir por primera vez con nosotros.
                  Experoiencia de los que estan conociendo el futuro del internet.
                </p> <!-- d De display  -->
                <a href="#" class="btn btn-outline-light">Quiero ser Orador</a>
                <button type="button" class="btn btn-platzi">Comprar Tikets</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
  <!--ENDMAIN-CAROUSEL-->

  <!--SECTION-->
  <section id="speakers" class="mt-4">
    <div class="container">
      <div class="row">
        <div class="col text-center text-uppercase">
          <small>Conoce a los </small>
          <h2>Artistas</h2>
        </div>
      </div>


      <div class="row">

        <div class="col-lg-4 col-md-3 col-sm-12  mb-4">
          <div class="card">
            <img src="./imagenes/Yjpg.jpg" class="card-img-top" alt="yoimar">
            <div class="card-body">
              <h5 class="card-title mb-0">Yoimar Rivas</h5>
              <div class="badges mb-2">
                <span class="badge badge-warning">JavaScript</span>
                <span class="badge badge-info">React</span>
              </div>
              <p class="card-text">无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem
                Ipsum的目的就是为了保持字母多多少少标准及平均的分配.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-12  mb-4">
          <div class="card">
            <img src="./imagenes/Yjpg.jpg" class="card-img-top" alt="yoimar">
            <div class="card-body">
              <h5 class="card-title mb-0">Yoimar Rivas</h5>
              <div class="badges mb-2">
                <span class="badge badge-warning">JavaScript</span>
                <span class="badge badge-info">React</span>
              </div>
              <p class="card-text">无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem
                Ipsum的目的就是为了保持字母多多少少标准及平均的分配.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-12 mb-4">
          <div class="card">
            <img src="./imagenes/Yjpg.jpg" class="card-img-top" alt="yoimar">
            <div class="card-body">
              <h5 class="card-title mb-0">Yoimar Rivas</h5>
              <div class="badges mb-2">
                <span class="badge badge-warning">JavaScript</span>
                <span class="badge badge-info">React</span>
              </div>
              <p class="card-text">无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem
                Ipsum的目的就是为了保持字母多多少少标准及平均的分配.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section>
  <!--ENDSECTION-->


  @endsection

</body>

</html>