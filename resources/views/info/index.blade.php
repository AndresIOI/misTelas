<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mis Telas </title>
    <!--Font Google-->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!--ScrollReveal-->
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  </head>
  <body>
      <!--NavBar-->
      <nav id="nav" class="navbar navbar-expand-lg navbar-dark  fixed-top" style="color : #17202A;">
          <div class="container">
            <a class="navbar-brand" href="{{route('welcome')}}">Mis Telas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                @if (Request::url() == route('welcome'))
                <li class="nav-item ">
                    <a class="nav-link" href="#header">Inicio</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="#info-one">Nosotros</a>
                  </li>
                @endif
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('shop')}}">Vista nuestra tienda !!</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      @yield('content')
      <footer id="footer" >
        <div class="container">
          <div class="row">
            <div class="col-md-4 mt-5">
              <h2>Sobre Nosotros</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="col-md-4 mt-5">
              <h2>Contacto</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="col-md-4 mt-5">
              <h2>Conectate</h2>
              <a href="https://www.facebook.com/" target="_blank"><img src="{{ asset('img/facebook-logo-1.png') }}" style="width:10%;"></a>
              <a href="https://www.instagram.com/?hl=es-la" target="_blank"><img src="{{ asset('img/instagram-symbol.png') }}" style="width:10%;"></a>
              <a href="https://twitter.com/?lang=es" target="_blank"><img src="{{ asset('img/twitter-sign.png') }}" style="width:10%;"></a>
              <a href="https://www.youtube.com/?hl=es-419&gl=MX" target="_blank"><img src="{{ asset('img/youtube-logo-1.png') }}" style="width:10%;"></a>
            </div>
          </div>
        </div>
      </footer>

    <!--Bootstrap 4 Scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!--Scripts-->
    <script>
      window.sr = ScrollReveal();
      sr.reveal('.navbar',{
        duration: 2000,
        origin: 'bottom',
      });
      sr.reveal('.header-content-left',{
        duration: 2000,
        origin: 'top',
        distance: '300px',
      });
      sr.reveal('.header-content-right',{
        duration: 2000,
        origin: 'top',
        distance: '300px',
      });
      sr.reveal('#testimonial',{
        duration: 2000,
        origin: 'left',
        distance: '300px',
      });

      <!--Scroll-->
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();

          document.querySelector(this.getAttribute('href')).scrollIntoView({
              behavior: 'smooth'
              });
          });
      });
    </script>



  </body>
</html>
