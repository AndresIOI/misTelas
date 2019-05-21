@extends('info.index')
@section('content')
    

  
  
  
      <!--Header-->
      <header id="header">
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-6 my-auto">
              <div class="header-content-left">
                <img src="{{ asset('img/Telas_1.jpg') }}" style="width:100%;">
              </div>
            </div>
            <div class="col-md-6">
              <div class="header-content-right">
                <h1 style="font-size: 44.9px;">Mis Telas.</h1>
                <p class="mt-5">CALIDAD TEXTIL EN NUESTRAS TELAS DE MODA
                    Trabajamos para ofrecer a los clientes y consumidores soluciones textiles que superan sus expectativas. Proporcionamos telas con las tecnologías más innovadoras del momento.</p>
                <a href="{{route('blog')}}" class="btn btn-outline-secondary btn-lg mt-2">Leer Mas</a>
              </div>
            </div>
          </div>
        </div>
      </header>
  
      <!--Testimonial-->
      <section id="testimonial" class="mt-5">
        <div class="container">
          <p class="h2 mb-2">Una de las mejores empresas para compra de materiales textiles.</p>
          <p class="h4">- Juan Medina</p>
        </div>
      </section>
  
      <!--INFO one-->
      <section id="info-one">
        <div class="container">
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="info-left">
                <img src="{{ asset('img/Telas_3.jpg') }}" style="width:100%;">
              </div>
            </div>
            <div class="col-md-6 my-auto">
              <h2>Trayectoria Que Transforma</h2>
              <p>¡70 años de profunda inspiración por lo que hacemos, se han convertido en nuestro sello para el mundo!

                  Las ideas que hemos creado han transformado el estilo de varias generaciones, revolucionando las tendencias de cada época. Hoy sabemos que la imaginación es tan amplia como la creatividad, por eso hemos querido compartir con ustedes una historia que ha estado marcada por la capacidad de imaginar y transformar vidas.</p>
              <a href="{{route('blog')}}" class="btn btn-outline-secondary btn-lg">Leer Mas</a>
            </div>
          </div>
        </div>
      </section>
  
      <!--INFO two-->
      <section id="info-dos">
        <div class="container">
          <div class="row my-5">
            <div class="col-md-6">
              <h2>2012</h2>
              <p>Mis Telas galardonada como Mejor Empresa Textil en los premios Infashion 2012 por su trabajo y trayectoria en el mundo de la moda.</p>
            </div>
            <div class="col-md-6">
              <h2>Responsabilidad Social</h2>
              <p>Desde hace 35 años LAFAYETTE entendió la importancia de una vivienda propia para sus empleados y hoy ha beneficiado a màs de 282 familias con hogares.</p>
            </div>
          </div>
        </div>
      </section>
  
      <!--Footer-->
      
@endsection