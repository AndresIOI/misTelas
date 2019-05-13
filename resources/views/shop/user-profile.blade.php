@extends('layouts.shop')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3>Datos de usuario</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Nombre de usuario: {{ Auth::user()->name}}</p>
                    <p class="card-text">Email: {{ Auth::user()->email}}</p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Datos de pedido</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <tr>
                                <th>Numero de venta</th>
                                <th>Subtotal</th>
                                <th>Envio</th>
                                <th>Total</th>
                                <th>Fecha de venta</th>
                                <th>Acciones</th>
                            </tr>
                            @foreach($ordenes as $orden)
                                <tr>
                                    <td>{{ $orden->id }}</td>
                                    <td>${{ number_format($orden->subtotal,2) }}</td>
                                    <td>{{ number_format($orden->envio) }}</td>
                                    <td>${{ number_format($orden->subtotal + $orden->envio)}}</td>
                                    <td>{{ $orden->created_at }}</td>
                                    <td><a href="{{ route('details-order', $orden->id)}}" class="btn btn-success">Ver detalles</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection