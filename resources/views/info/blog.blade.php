@extends('info.index')
@section('content')
    <!--Header-->
    <section align="center" id="logo" style="margin-top: 50px;">
            <div class="container">
              <img src="{{ asset('img/logo.png') }}" style="width: 250px; height: 250px;">
            </div>
          </section>
      
          <!--INFO-->
          <section id="info">
            <div class="container">
              <p class="h4">Somos una sólida empresa mexicana que por más de 25 años ha desarrollado un modelo de operación exitoso. Contamos con casi 7,500 colaboradores y muchas historias de éxito en las cuales el factor principal has sido tú.

                  Queremos ser una empresa institucional y moderna, lo cual significa que sea ordenada, disciplinada, con procesos y resultados firmes.</p>
                  
                  <p class="h4"> Misión: Otorgar a las familias mexicanas productos de gran calidad a bajo costo, para confeccionar prendas y decorar su hogar.</p>
                  
                  <p class="h4"> Visión:  Ser la empresa líder en el ramo textil, ofreciendo los precios más bajos garantizando la calidad y servicio.</p>
                  
                  <p class="h4">Valores:  Honestidad, lealtad, compromiso y respeto.</p>
                  
                  
              <h1 id="titulos" class="mt-5">Una de las Empresas para manufacturar y vender productos de tela.</h2>
              <p class="h4 mt-3">En Mis Telas encontrarás la mayor variedad en telas para confeccionar la ropa de toda la familia y la decoración del hogar. Contamos con productos que te ayudarán a concretar tus ideas como telas para vestidos de noche, faldas, blusas, pantalones, trajes, sudaderas, playeras, camisas, cortinas, ropa de cama, manteles, sábanas, cojines, trapos de cocina, jergas, franelas, tapicería, etc.</p>
            </div>
          </section>
      
          <!--Galaeria-->
          <section id="galeriaTitulo">
            <div class="container mt-5">
              <h1 id="titulos">GALAERIA</h1>
            </div>
          </section>
      
          <section>
            <div class="container mt-5">
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="galery-content-left">
                    <img src="{{ asset('img/Telas_2.jpg') }}" style="width:100%;">
                  </div>
                </div>
                <div class="col-md-6 my-auto">
                  <h2>Innovacion</h2>
                  <p>Investigación e innovación en desarrollo
                      Basamos nuestros procesos textiles en los más altos parámetros de investigación e innovación. Desarrollamos soluciones textiles superiores para mercados sensibles a la imagen y desempeño. Nuestras telas y servicios gozan de un alto sentido de la innovación. Estamos en una permanente búsqueda de transformación, siempre dinámicos y a la vanguardia de la tecnología.<laborum class=""></laborum></p>
                </div>
              </div>
            </div>
          </section>
      
          <section>
            <div class="container mt-5">
              <div class="row">
                <div class="col-md-6 my-auto">
                  <h2>Tecnologia</h2>
                  <p>Elaboramos nuestras telas con tecnología de punta
                      Que nos permite estar a la vanguardia de las últimas tendencias en materiales, texturas, estampados y acabados funcionales para todos nuestros mercados. Contamos con un amplio portafolio de telas inteligentes que suplen las necesidades de los usuarios.</p>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('img/Telas_4.jpg') }}" style="width:100%;">
                </div>
              </div>
            </div>
          </section>
      
          <section style="margin-bottom: 100px;">
            <div class="container mt-5" >
              <div class="row">
                <div class="col-md-6">
                  <img src="{{ asset('img/Telas_5.jpg') }}" style="width:100%;">
                </div>
                <div class="col-md-6 my-auto">
                  <h2>Nuestra Gente</h2>
                  <p>Somos una compañía textil, que se preocupa por el bienestar y la calidad de vida de nuestros colaboradores y sus familias. Nuestra gente es uno de los factores clave de éxito de la empresa, lo que nos compromete a mejorar la calidad de vida de los colaboradores y sus familias.</p>
                </div>
              </div>
            </div>
          </section>
      
@endsection