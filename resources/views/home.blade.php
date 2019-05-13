@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->rol_id == 1)
                    <div class="form-group">
                        <a class ="btn btn-primary" href="">Entradas de Tela</a>
                    </div>
                    <div class="form-group">
                        <a class ="btn btn-primary" href="">Salidas de Tela</a> 
                    </div>    
                    <div class="form-group">
                        <a class ="btn btn-primary" href="">Reingresos de Tela</a> 
                    </div>    
                    <div class="form-group">
                        <a class ="btn btn-primary" href="">Devoluciones de Tela</a>
                    </div>
                    <div class="form-group">
                        <a class ="btn btn-primary" href="">Inventario de Tela</a>
                    </div>    
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
