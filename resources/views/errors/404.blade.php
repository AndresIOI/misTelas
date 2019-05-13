@extends('layouts.app')
@section('error')
<div class="text-center">
    <h1>Pagina no encontrada.</h1>
    <h1>¿Cree que es un error?</h1>
    <h1>Contacte al Administrador.</h1>
    <img src="{{ asset('images/logo.png') }}" width="600" height="250">
</div>
@endsection