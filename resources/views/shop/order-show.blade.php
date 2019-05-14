@extends('layouts.shop')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detalles del pedido</h3>
        </div>
        <div class="card-body">
            <p><span style="font-weight:bold">Número de pedido: </span>{{$orden->id}}</p>
            <p><span style="font-weight:bold">Subtotal: </span>${{ number_format($orden->subtotal)}}</p>
            <p><span style="font-weight:bold">Envio: </span>${{number_format($orden->envio)}}</p>
            <p><span style="font-weight:bold">Total: </span>${{ number_format($orden->subtotal + $orden->envio)}}</p>
            <p><span style="font-weight:bold">Fecha: </span>{{ $orden->created_at}}</p>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>SKU</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                    <tbody>
                        @foreach ($orden->productos as $producto)
                            <tr>
                                <td>{{ $producto->producto->SKU }}</td>
                                <td>{{ $producto->producto->descripcion}}</td>
                                <td>{{ $producto->pivot->cantidad}}</td>
                                <td>${{ number_format($producto->pivot->precio)}}</td>
                                <td>${{ number_format($producto->pivot->cantidad * $producto->pivot->precio)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection