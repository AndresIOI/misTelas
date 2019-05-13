@extends('layouts.index')
@section('titulo','Registar Usuario')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{ route('Telas.store') }}">
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Registro de tela</div>
            <div class="card-body">

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Clave') }}</label>

    <div class="col-md-6">
        <input id="clave" type="text" class="form-control{{ $errors->has('Clave') ? ' is-invalid' : '' }}" name="clave" value="{{ old('Clave') }}" required autofocus>

        @if ($errors->has('Clave'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Clave') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
    
            <div class="col-md-6">
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
        </div>
</div>
<div class="form-group row">
        <label for="tipo_id" class="col-md-4 col-form-label text-md-right">Tipo</label>
    
        <div class="col-md-6">
        <select name="tipo_id" id="tipo_id" class="form-control">
            <option value="" selected>Seleccione el tipo</option>
            @foreach ($tipos as $tipo)
                <option value="{{$tipo->id_tipo_tela}}">{{$tipo->tipo_tela}}</option>
            @endforeach
        </select>
    </div>
        </div>
<div class="form-group row">
        <label for="unidad" class="col-md-4 col-form-label text-md-right">Unidad</label>

        <div class="col-md-6">
        <select name="unidad" id="unidad" class="form-control">
            <option value="" selected>Seleccione el tipo</option>
            <option value="KG">KG</option>
            <option value="MTS">MTS</option>
        </select>
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




@endsection
    
