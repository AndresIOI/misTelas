@extends('layouts.index')
@section('titulo','Actualizar Usuario')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{ route('Usuarios.update',$usuario->id) }}" >
            @csrf
            @method('PUT')
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Usuario</div>
            <div class="card-body">

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $usuario->name }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('username') ?  'has-error' : '' }}">
        <label for="username" class="col-md-4 col-form-label text-md-right">Nombre de Usuario</label>

       <div class="col-md-6">
        <input id="username" type="text" class="form-control" name="username" value="{{ $usuario->username }}" required maxlength="15">
       
       @if ($errors->has('username'))
        <span class="help-block">
        <strong>{{ $errors->first('username') }}</strong>
        </span>
        @endif
        </div>
        </div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuario->email }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
    </div>
</div>
<div class="form-group row">
    <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
    <div class="col-md-6">
        <select name="tipo">
            <option value="{{$usuario->rol->id}}">{{$usuario->rol->rol}}</option>
            @foreach ($roles as $rol)
            @if($usuario->rol->rol != $rol->rol)
                <option value="{{$rol->id}}">{{$rol->rol}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success">
            {{ __('Actualizar') }}
        </button>
    </div>
</div>
            </div>
            </div>

        </form>

@endsection
    