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
                <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="{{route('blog')}}" class="btn btn-outline-secondary btn-lg mt-2">Leer Mas</a>
              </div>
            </div>
          </div>
        </div>
      </header>
  
      <!--Testimonial-->
      <section id="testimonial" class="mt-5">
        <div class="container">
          <p class="h2 mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.asdasd ad asd asd asd asasdasdasd sadasda</p>
          <p class="h4">- Andres Villanueva</p>
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
              <h2>Informacion One</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
              <h2>Informacion 2-1</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-6">
              <h2>Informacion 2-2</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </section>
  
      <!--Footer-->
      
@endsection