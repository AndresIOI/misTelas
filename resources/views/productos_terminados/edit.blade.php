@extends('layouts.index')
@section('titulo','Editar Producto Terminado')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{ route('ProductosTerminados.update',$producto->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Editar producto terminado</div>
            <div class="card-body">

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('SKU') ? ' is-invalid' : '' }}" name="SKU" value="{{$producto->SKU}}" required autofocus>

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
        <option value="{{$producto->clasificacion_id}}" selected>{{$producto->clasificacion->clasificacion_producto}}</option>
        @foreach ($clasificaciones as $clasificacion)
        @if ($producto->clasificacion->clasificacion_producto != $clasificacion->clasificacion_producto)
        <option value="{{$clasificacion->id}}">{{$clasificacion->clasificacion_producto}}</option>
        @endif
        @endforeach
    </select>
</div>
    </div>

<div class="form-group row">
        <label for="tipo_id" class="col-md-4 col-form-label text-md-right">Tipos</label>

        <div class="col-md-6">
        <select name="tipo_id" id="tipo_id" class="form-control">
            <option value="{{$producto->tipo_id}}" selected>{{$producto->tipo->tipo_producto}}</option>
        </select>
    </div>
</div>

<div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
    
            <div class="col-md-6">
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control">{{$producto->descripcion}}</textarea>
        </div>
</div>
<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Precio al publico sin IVA') }}</label>
    
        <div class="col-md-6">
            <input id="name" type="number" step="0.01" class="form-control" name="precio_publico" value="{{$producto->precio_publico}}" required autofocus>
    
        </div>
    </div>

<div class="form-group row">
    <label for="img" class="col-md-4 col-form-label text-md-right">Seleccione imagen del producto</label>

    <div class="col-md-6">
        <input id="img" type="file" class="" name="img" >
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success">
            Actualizar
        </button>
    </div>
</div>
            </div>
            </div>

        </form>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src={{asset("js/productos_terminados.js")}}></script>


@endsection
    
