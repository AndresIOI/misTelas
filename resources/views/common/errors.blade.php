{{--Validacion de campos para mostrar error al usuario--}}
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
</div>
@endif