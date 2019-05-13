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
          <!-- Area Chart Admins-->
          @if(Auth::user()->rol_id ==1 || Auth::user()->rol_id ==2 || Auth::user()->rol_id ==6)
          <div class="card mb-3">
            <div class="card-header">
              <i class="far fa-clock"></i>
              Ultimas Entradas</div>
            <div class="card-body">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Tela" readonly disabled style="font-weight:bold;">
              </div>
              <table class="table table-bordered table-striped table-responsive-md">
                <thead class="  " style="background-color:rgb(77,77,79)">
                  <tr style="color:white">
                    <th scope="col">Orden de Compra</th>
                    <th scope="col">Clave Factura</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Persona que recibio</th>
                  </tr>
                </thead>
                <tbody>
              <tr>
              <td><a href="/Entrada-Tela/{{$entradas->id}}">{{$entradas->num_entrada}}</a></td>
                <td>{{$entradas->cve_factura}}</td>
                <td>{{$entradas->fecha}}</td>
                <td>{{$entradas->OperarioRecepcion}}</td>
              </tr>
                  </tbody>
                  </table>
          <div class="form-group"><input class="form-control" type="text" placeholder="Habilitaciónes" readonly disabled style="font-weight:bold;"></div>
          <table class="table table-bordered table-striped table-responsive-md">
            <thead class="" style="background-color:rgb(77,77,79)">
              <tr style="color:white">
                <th scope="col">Orden de Compra</th>
                <th scope="col">Clave Factura</th>
                <th scope="col">Fecha</th>
                <th scope="col">Persona que recibió</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td><a href="/Entrada-Habilitacion/{{$entradas_habilitacion->id}}">{{$entradas_habilitacion->ordenCompra}}</a></td>
                <td>{{$entradas_habilitacion->claveFactura}}</td>
                <td>{{$entradas_habilitacion->created_at}}</td>
                <td>{{$entradas_habilitacion->usuario_compras->nombre_usuarioCH}}</td>
                </tr>
            </tbody>
              </table>
              <div class="form-group"><input class="form-control" type="text" placeholder="Productos Terminados" readonly disabled style="font-weight:bold;"></div>
          <table class="table table-bordered table-striped table-responsive-md">
            <thead class="" style="background-color:rgb(77,77,79)">
              <tr style="color:white">
                  <th scope="col">Clave Factura</th>
            <th scope="col">Persona que recibió</th>
            <th scope="col">Fecha</th>
            <th scope="col">Maquilero</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td><a href="/Entrada-Terminados/{{$pt->id}}">{{$pt->numero_entrada}}</a></td>
                  <td>{{$pt->usuarioT->nombre_usuarioT}}</td>
                  <td>{{$pt->created_at}}</td> 
                  <td>{{$pt->maquilero->nombre_maquilero}}</td>
              </tr>
          </tbody>
              </table>
            </div>
            <div class="card-footer small text-muted">Actualizado al momento</div>
          </div>
         @endif
         <!-- Area Chart TELA-->
         @if(Auth::user()->rol_id ==3)
         <div class="card mb-3">
           <div class="card-header">
             <i class="far fa-clock"></i>
             Ultimos Registros</div>
           <div class="card-body">
             <div class="form-group"><input class="form-control" type="text" placeholder="Entradas" readonly disabled style="font-weight:bold;"></div>
             <table class="table table-bordered table-striped table-responsive-md">
               <thead class="thead-dark">
                 <tr>
                   <th scope="col">Numero Entrada</th>
                   <th scope="col">Clave Factura</th>
                   <th scope="col">Fecha</th>
                   <th scope="col">Persona que recibio</th>
                 </tr>
               </thead>
               <tbody>
             <tr>
             {{-- asda --}}
             <td><a href="/Entrada-Tela/{{$entradas->id}}">{{$entradas->num_entrada}}</a></td>
               <td>{{$entradas->cve_factura}}</td>
               <td>{{$entradas->fecha}}</td>
               <td>{{$entradas->OperarioRecepcion}}</td>
             </tr>
                 </tbody>
                 </table>
         <div class="form-group"><input class="form-control" type="text" placeholder="Salidas" readonly disabled style="font-weight:bold;"></div>
         <table class="table table-bordered table-striped table-responsive-md">
           <thead class="thead-dark">
             <tr>
               <th scope="col">Numero de Requisición</th>
               <th scope="col">Fecha</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td><a href="/Salida-Tela/{{$salidas->numeroRequisicion}}">{{$salidas->numeroRequisicion}}</a></td>
               <td>{{$salidas->created_at}}</td>
             </tr>
             </tbody>
             </table>
             <div class="form-group"><input class="form-control" type="text" placeholder="Reingresos" readonly disabled style="font-weight:bold;"></div>
         <table class="table table-bordered table-striped table-responsive-md">
           <thead class="thead-dark">
             <tr>
               <th scope="col">Numero de Requisición</th>
               <th scope="col">Fecha</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td><a href="/Reingreso-Tela/{{$salidas->id}}">{{$salidas->numeroRequisicion}}</a></td>
               <td>{{$salidas->created_at}}</td>
             </tr>
             </tbody>
             </table>
             <div class="form-group"><input class="form-control" type="text" placeholder="Devoluciones" readonly disabled style="font-weight:bold;"></div>
         <table class="table table-bordered table-striped table-responsive-md">
           <thead class="thead-dark">
             <tr>
                <th scope="col">Número de Entrada</th>
                <th scope="col">Clave Factura</th>
                <th scope="col">Número Devolución</th>
             </tr>
           </thead>
           <tbody>
              <tr>
                  <td><a href="/Devolucion-Tela/{{$dovoluciones->id_devolucion}}">{{$dovoluciones->ordenCompra}}</td>
                    <td>{{$dovoluciones->id_usuario}}</td>
                  <td>{{$dovoluciones->id_devolucion}}</td>
                </tr>
         </tbody>
             </table>
           </div>
           <div class="card-footer small text-muted">Actualizado al momento</div>
         </div>
        @endif
        <!-- Area Chart HABILITACION-->
        @if(Auth::user()->rol_id ==4)
        <div class="card mb-3">
          <div class="card-header">
            <i class="far fa-clock"></i>
            Ultimos Registros</div>
          <div class="card-body">
            <div class="form-group"><input class="form-control" type="text" placeholder="Entradas" readonly disabled style="font-weight:bold;"></div>
            <table class="table table-bordered table-striped table-responsive-md">
              <thead class="thead-dark">
                <tr>
                    <th scope="col">Orden de Compra</th>
                    <th scope="col">Clave Factura</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Persona que recibió</th>
                </tr>
              </thead>
              <tbody>
            <tr>
                <td><a href="/Entrada-Habilitacion/{{$entradas_habilitacion->id}}">{{$entradas_habilitacion->ordenCompra}}</a></td>
                <td>{{$entradas_habilitacion->claveFactura}}</td>
                <td>{{$entradas_habilitacion->created_at}}</td>
                <td>{{$entradas_habilitacion->usuario_compras->nombre_usuarioCH}}</td>
            </tr>
                </tbody>
                </table>
        <div class="form-group"><input class="form-control" type="text" placeholder="Salidas" readonly disabled style="font-weight:bold;"></div>
        <table class="table table-bordered table-striped table-responsive-md">
          <thead class="thead-dark">
            <tr>
                <th scope="col">Número de Requisición</th>
                <th scope="col">Fecha</th>
                <th scope="col">Número de Salida</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><a href="/Salida-Habilitacion/{{$salidas_habilitacion->id}}">{{$salidas_habilitacion->numero_requisicion}}</a></td>
                  <td>{{$salidas_habilitacion->created_at}}</td>
                  <td>{{$salidas_habilitacion->id}}</a></td>
            </tr>
            </tbody>
            </table>
            <div class="form-group"><input class="form-control" type="text" placeholder="Reingresos" readonly disabled style="font-weight:bold;"></div>
        <table class="table table-bordered table-striped table-responsive-md">
          <thead class="thead-dark">
            <tr>
                <th scope="col">Número de Requisición</th>
                <th scope="col">Fecha</th>
                <th scope="col">Número de Reingreso</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><a href="/Reingreso-Habilitacion/{{$reingresos_habilitacion->id}}">{{$reingresos_habilitacion->numero_requisicion}}</td>
                  <td>{{$reingresos_habilitacion->created_at}}</td>
                  <td>{{$reingresos_habilitacion->id}}</a></td>
            </tr>
            </tbody>
            </table>
            <div class="form-group"><input class="form-control" type="text" placeholder="Devoluciones" readonly disabled style="font-weight:bold;"></div>
        <table class="table table-bordered table-striped table-responsive-md">
          <thead class="thead-dark">
            <tr>
                <th scope="col">Orden de Compra</th>
                <th scope="col">Clave Factura</th>
                <th scope="col">Fecha</th>
                <th scope="col">Número de Devolución</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><a href="/Devolucion-Habilitacion/{{$devoluciones_habilitacion->id}}">{{$devoluciones_habilitacion->entrada->ordenCompra}}</td>
                  <td>{{$devoluciones_habilitacion->entrada->claveFactura}}</td>
                  <td>{{$devoluciones_habilitacion->created_at}}</td>
                  <td>{{$devoluciones_habilitacion->id}}</a></td>
            </tr>
        </tbody>
            </table>
          </div>
          <div class="card-footer small text-muted">Actualizado al momento</div>
        </div>
       @endif
       <!-- Area Chart PT-->
       @if(Auth::user()->rol_id ==5)
       <div class="card mb-3">
         <div class="card-header">
           <i class="far fa-clock"></i>
           Ultimos Registros</div>
         <div class="card-body">
           <div class="form-group"><input class="form-control" type="text" placeholder="Entradas" readonly disabled style="font-weight:bold;"></div>
           <table class="table table-bordered table-striped table-responsive-md">
             <thead class="thead-dark">
               <tr>
                <th scope="col">Clave Factura</th>
                <th scope="col">Persona que recibió</th>
                <th scope="col">Fecha</th>
                <th scope="col">Maquilero</th>
               </tr>
             </thead>
             <tbody>
              <tr>
                <td><a href="/Entrada-Terminados/{{$pt->id}}">{{$pt->numero_entrada}}</a></td>
                <td>{{$pt->usuarioT->nombre_usuarioT}}</td>
                <td>{{$pt->created_at}}</td> 
                <td>{{$pt->maquilero->nombre_maquilero}}</td>
              </tr>
               </tbody>
               </table>
       <div class="form-group"><input class="form-control" type="text" placeholder="Salidas" readonly disabled style="font-weight:bold;"></div>
       <table class="table table-bordered table-striped table-responsive-md">
         <thead class="thead-dark">
           <tr>
            <th scope="col">Numero de Requisicion</th>
            <th scope="col">Fecha</th>
           </tr>
         </thead>
         <tbody>
           <tr>
            <td><a href="/Salida-Terminados/{{$spt->id}}">{{$spt->numero_requisicion}}</a></td>
            <td>{{$spt->created_at}}</td>
           </tr>
           </tbody>
           </table>
           <div class="form-group"><input class="form-control" type="text" placeholder="Reingresos" readonly disabled style="font-weight:bold;"></div>
       <table class="table table-bordered table-striped table-responsive-md">
         <thead class="thead-dark">
           <tr>
             <th scope="col">Numero de Requisicion</th>
             <th scope="col">Fecha</th>
             <th scope="col">Número de Reingreso</th>
           </tr>
         </thead>
         <tbody>
          <tr>
            <td><a href="/Reingreso-Terminados/{{$rpt->id}}">{{$rpt->salida->numero_requisicion}}</a></td>
            <td>{{$rpt->created_at}}</td>
            <td>{{$rpt->id}}</td>
          </tr>
           </tbody>
           </table>
           <div class="form-group"><input class="form-control" type="text" placeholder="Devoluciones" readonly disabled style="font-weight:bold;"></div>
       <table class="table table-bordered table-striped table-responsive-md">
         <thead class="thead-dark">
          <tr>
            <th scope="col">Factura</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de Devolución</th>
          </tr>
         </thead>
         <tbody>
          <tr>
            <td><a href="/Devolucion-Terminados/{{$dpt->id}}">{{$dpt->entrada->numero_entrada}}</a></td>
            <td>{{$dpt->created_at}}</td>
            <td>{{$dpt->id}}</td>
          </tr>
       </tbody>
           </table>
         </div>
         <div class="card-footer small text-muted">Actualizado al momento</div>
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
          