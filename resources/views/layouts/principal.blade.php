@extends('layouts.index')
@section('titulo','Ditextil')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{route('Principal.index')}}">Ditextil</a>
            </li>
            <li class="breadcrumb-item active">Inicio</li>
          </ol>

          <!-- Icon Cards-->
          @if(Auth::user()->rol_id ==1 || Auth::user()->rol_id ==2 || Auth::user()->rol_id ==6 )
          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-3">
              <div class="card text-white  o-hidden h-100" style="background-color:rgb(77,77,79)">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-warehouse"></i>
                  </div>
                  <h3><div class="mr-5">Telas</div></h3>
                </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('Telas.index')}}">
                  <span class="float-left">Ver Detalles</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
              <div class="card text-white o-hidden h-100" style="background-color:rgb(41,98,167)">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tags"></i>
                  </div>
                  <h3><div class="mr-5">Habilitación</div></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('Habilitaciones.index')}}">
                  <span class="float-left">Ver Detalles</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tshirt"></i>
                  </div>
                  <h3><div class="mr-5">Productos Terminados</div></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('ProductosTerminados.index')}}">
                  <span class="float-left">Ver Detalles</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          @endif
          {{--Vista Telas--}}
          @if(Auth::user()->rol_id ==3 )
          <div class="row">
            <div class="col-xl-12 col-sm-6 mb-3">
              <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-warehouse"></i>
                  </div>
                  <h3><div class="mr-5">Inventario Total Telas</div></h3>
                </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('Telas.index')}}">
                  <span class="float-left">Ver Detalles</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          @endif
          {{--Vista Habilitación--}}
          @if(Auth::user()->rol_id ==4 )
          <div class="row">
            <div class="col-xl-12 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tags"></i>
                  </div>
                  <h3><div class="mr-5">Inventario Total Habilitación</div></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('Habilitaciones.index')}}">
                  <span class="float-left">Ver Detalles</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          @endif
          {{--Vista Terminados--}}
          @if(Auth::user()->rol_id ==5)
          <div class="row">
            <div class="col-xl-12 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tshirt"></i>
                  </div>
                  <h3><div class="mr-5">Inventario Total Productos Terminados</div></h3>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('ProductosTerminados.index')}}">
                  <span class="float-left">Ver Detalles</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          @endif
      
        
         <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Diseño E Impresión Textil S.A de C.V</span>
            </div>
          </div>
        </footer>
@endsection
          