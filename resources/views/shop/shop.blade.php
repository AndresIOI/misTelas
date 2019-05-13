@extends('layouts.shop')
@section('content')
<div class="container">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="row">
            @foreach ($productos_inventario as $producto)

        <div class="col-4">
                <div class="card" style="width: 18rem; margin-bottom: 50px;">
                        <img class="card-img-top" src="img/{{$producto->producto->img}}" alt="Card image cap" style="weight:100px; height: 200px;">
                        <div class="card-body">
                          <h5 class="card-title">{{$producto->producto->SKU}}</h5>
                          <p class="card-text">{{$producto->producto->tipo->tipo_producto}}</p>
                          <p class="card-text">Talla: {{$producto->talla->talla}}</p>
                          <p class="card-text" style="color:green;"><span style="font-weight: bold">Precio: </span>${{$producto->producto->precio_publico}}</p>
                          <!--<a href="#" class="btn btn-primary">Ver producto</a>-->
                          <a href="{{route('cart-add', $producto->id)}}" class="btn btn-success">Agregar al carrito</a>
                        </div>
                        <div class="card-footer text-muted">
                                En stock: {{$producto->cantidad_inventario}}
                        </div>
                    </div>
        </div>

        @endforeach
    </div>
</div>
    
@endsection