@extends('layouts.index')
@section('titulo','Registar Usuario')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{ route('ProductosTerminados.store') }}" enctype="multipart/form-data">
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Registro de producto terminado</div>
            <div class="card-body">

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('SKU') ? ' is-invalid' : '' }}" name="SKU" value="{{ old('SKU') }}" required autofocus>

        @if ($errors->has('SKU'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('SKU') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="clasificacion_id" class="col-md-4 col-form-label text-md-right">Clasificaciones</label>

    <div class="col-md-6">
    <select name="clasificacion_id" id="clasificacion_id" class="form-control">
        <option value="" selected>Seleccione la clasificacion</option>
        @foreach ($clasificaciones as $clasificacion)
            <option value="{{$clasificacion->id}}">{{$clasificacion->clasificacion_producto}}</option>
        @endforeach
    </select>
</div>
    </div>

<div class="form-group row">
        <label for="tipo_id" class="col-md-4 col-form-label text-md-right">Tipos</label>

        <div class="col-md-6">
        <select name="tipo_id" id="tipo_id" class="form-control">
            <option value="" selected>Seleccione el tipo</option>
        </select>
    </div>
</div>

<div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
    
            <div class="col-md-6">
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
        </div>
</div>
<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Precio al publico') }}</label>
    
        <div class="col-md-6">
            <input id="name" type="number" class="form-control{{ $errors->has('precio_publico') ? ' is-invalid' : '' }}" name="precio_publico" value="{{ old('SKU') }}" required autofocus>
    
            @if ($errors->has('precio_publico'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('SKU') }}</strong>
                </span>
            @endif
        </div>
    </div>

<div class="form-group row">
    <label for="img" class="col-md-4 col-form-label text-md-right">Seleccione imagen del producto</label>

    <div class="col-md-6">
        <input id="img" type="file" class="" name="img" required>
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success">
            {{ __('Registrar') }}
        </button>
    </div>
</div>
            </div>
            </div>

        </form>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src={{asset("js/productos_terminados.js")}}></script>


@endsection
    
