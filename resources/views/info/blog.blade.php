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
              <p class="h4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p class="h4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <h1 id="titulos" class="mt-5">Una de las Empresas para manufacturar y vender productos de tela.</h2>
              <p class="h4 mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                  <h2>Titulo 1</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est <laborum class=""></laborum></p>
                </div>
              </div>
            </div>
          </section>
      
          <section>
            <div class="container mt-5">
              <div class="row">
                <div class="col-md-6 my-auto">
                  <h2>Titulo 2</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                  <h2>Titulo 3</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>
          </section>
      
@endsection