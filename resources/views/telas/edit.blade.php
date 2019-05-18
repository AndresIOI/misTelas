@extends('layouts.index')
@section('titulo','Editar Tela')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{ route('Telas.update',$tela->id) }}">
            @csrf
            @method('PUT')
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Editar de tela</div>
            <div class="card-body">

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Clave</label>

    <div class="col-md-6">
        <input id="clave" type="text" class="form-control" name="clave" value="{{ $tela->cve_tela }}" required autofocus>
    </div>
</div>


<div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
    
            <div class="col-md-6">
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control">{{$tela->descripcion}}</textarea>
        </div>
</div>
<div class="form-group row">
        <label for="tipo_id" class="col-md-4 col-form-label text-md-right">Tipo</label>
    
        <div class="col-md-6">
        <select name="tipo_id" id="tipo_id" class="form-control">
            <option value="{{$tela->tipo_tela}}" selected>{{$tela->tipo->tipo_tela}}</option>
            @foreach ($tipos as $tipo)
            @if ($tela->tipo->tipo_tela != $tipo->tipo_tela)
                 <option value="{{$tipo->id_tipo_tela}}">{{$tipo->tipo_tela}}</option>   
            @endif
            @endforeach
        </select>
    </div>
        </div>
<div class="form-group row">
        <label for="unidad" class="col-md-4 col-form-label text-md-right">Unidad</label>

        <div class="col-md-6">
        <select name="unidad" id="unidad" class="form-control">
            <option value="{{$tela->unidad}}" selected>{{$tela->unidad}}</option>
            @if ($tela->unidad == 'KG')
                <option value="MTS">MTS</option>    
            @else
                <option value="KG">KG</option>    
            @endif
            
            
        </select>
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




@endsection
    
