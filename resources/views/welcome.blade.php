<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Welcom</title>

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

  <link rel="stylesheet" href="Styles.css">
  {{-- Script del carrousel main.js --}}
  <script defer src="main.js"></script>
  {{-- fin script --}}

</head>

<body>

  @extends('layouts.app')

  @section('content')


  <div class="content-welcom content bg-witch">
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


  {{-- Nuevo carrousel --}}
  <div class="container">
    <div class="row">
      <section>

        <div class="Carousel">
          <h2>Su galeria de Arte Online</h2>
          <div class="slick-list" id="slick-list">
            <button class="slick-arrow slick-prev" id="button-prev">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left"
                class="svg-inline--fa fa-chevron-left fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512">
                <path fill="currentColor"
                  d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z">
                </path>
              </svg>
            </button>
            <div class="slick-track" id="track">
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/1.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/2.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/3.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/4.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/5.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/6.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/7.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/8.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/9.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/10.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/11.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/12.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/13.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/14.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
              <div class="slick">
                <div>
                  <a href="/">
                    <h4><small>Share Your Message</small>Watch</h4>
                    <picture>
                      <img src="/images/15.jpg" alt="Image">
                    </picture>
                  </a>
                </div>
              </div>
            </div>
            <button class="slick-arrow slick-next" id="button-next">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512">
                <path fill="currentColor"
                  d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                </path>
              </svg>
            </button>
          </div>
        </div>

      </section>
    </div>
  </div>
  {{--Fin Nuevo carrousel --}}

  <div class="img-histori">
    <img class="img d-block w-100" object-fit="fill" height="450" src="/images/decada.jpeg" alt="...">
  </div>

  <!--SECTION-->
  <section id="speakers" class="mt-4">
    <div class="container">
      <div class="row">
        <div class="col text-center text-uppercase">
          <small>Conoce a los </small>
          <h2>Artistas</h2>
        </div>
      </div>

      <div class="liner"></div>

      <div class="row">

        <div class="col-lg-4 col-md-3 col-sm-12  mb-4">
          <div class="card">
            <img src="/images/1.jpg" class="card-img-top" alt="yoimar">
            <div class="card-body">
              <h5 class="card-title mb-0">
                Hela</h5>
              <div class="badges mb-2">
                <span class="badge badge-warning">Graffiti</span>
                <span class="badge badge-info">Paris</span>
              </div>
              <p class="card-text">无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem
                Ipsum的目的就是为了保持字母多多少少标准及平均的分配.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-12  mb-4">
          <div class="card">
            <img src="./images/14.jpg" class="card-img-top" alt="yoimar">
            <div class="card-body">
              <h5 class="card-title mb-0">
                Rainero</h5>
              <div class="badges mb-2">
                <span class="badge badge-warning">Rainero</span>
                <span class="badge badge-info">Noruega</span>
              </div>
              <p class="card-text">无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem
                Ipsum的目的就是为了保持字母多多少少标准及平均的分配.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-12 mb-4">
          <div class="card">
            <img src="/images/7.jpg" class="card-img-top" alt="yoimar">
            <div class="card-body">
              <h5 class="card-title mb-0">
                Agnes</h5>
              <div class="badges mb-2">
                <span class="badge badge-warning">Agnes</span>
                <span class="badge badge-info">Alabama</span>
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