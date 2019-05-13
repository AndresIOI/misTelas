@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1>Usted no tiene permisos para ejecutar esta acción.</h1>
    <h1>¿Cree que es un error?  Contacte al Administrador.</h1>
    <img src="{{ asset('images/logo.png') }}" width="600" height="250">
    
</div>
<br>
<div class="text-center">
    <a href="/"><button>Regresar</button></a>
</div>
    @endsection