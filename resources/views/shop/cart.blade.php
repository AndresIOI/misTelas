@extends('layouts.shop')
@section('content')
<div class="container text-center">
		<div class="page-header">
		  <h1><i class="fa fa-shopping-cart"></i> Carrito de compras</h1>
		</div>

		<div class="table-cart">
			@if(count($cart))

			<p>
				<a href="{{ route('cart-trash') }}" class="btn btn-danger">
					Vaciar carrito <i class="fas fa-trash-alt"></i>
				</a>
			</p>

			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Imagen</th>
                            <th>Producto</th>
                            <th>Talla</th>
							<th>Precio</th>
							<th>IVA</th>
							<th>Cantidad</th>
							<th>Subtotal</th>
							<th>Quitar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $item)
							<tr> 
								<td><img src="{{ asset('img/'.$item->producto->img) }}"  alt="..." style="width: 50px; height: 50px;"></td>
                                <td>{{ $item->producto->SKU }}</td>
                                <td>{{ $item->talla->talla }}</td>
								<td>${{ number_format($item->producto->precio_publico,2) }}</td>
								<td>${{ number_format(($item->producto->precio_publico * .16)*$item->quantity,2)}}</td>
								<td>
									<input 
										type="number"
										min="1"
										max="{{$item->cantidad_inventario}}"
										value="{{ $item->quantity }}"
										id="product_{{ $item->id }}"
                                        
									>
									<a 
										href="#" 
										class="btn btn-warning btn-update-item"
										id="actualizar"
														data-href="{{ route('cart-update', $item->id) }}"
										data-id = "{{ $item->id }}"
									>
									<i class="fas fa-sync"></i>
									</a>
								</td>
								<td>${{ number_format(($item->producto->precio_publico * $item->quantity) + ($item->producto->precio_publico * .16)*$item->quantity,2) }}</td>
								<td>
									<a href="{{ route('cart-delete', $item->id) }}" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<h6 style="color:blue;">* - Hacer click en el icono de refrescar, para actualizar la cantidad de tus productos.</h6>

				<hr>
				
				<h3>
					<span class="label label-success">
						Total: ${{ number_format($total,2) }}
					</span>
				</h3>


			</div>

			@else
				<h3><span class="label label-warning">No hay productos en el carrito :(</span></h3>
			@endif
			<hr>
			<p>
				<a href="{{ url('/shop') }}" class="btn btn-primary">
					<i class="fa fa-chevron-circle-left"></i> Seguir comprando
				</a>

				<a href="{{ route('order-detail') }}" class="btn btn-primary">
				 Continuar <i class="fa fa-chevron-circle-right"></i>
				</a>
			</p>
		</div>

		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="{{ asset('js/shop.js') }}"></script>
    @endsection