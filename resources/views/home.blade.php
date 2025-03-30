@extends('layouts.app')

@section('title', 'Inicio')

@section('content_header')
    <h1>Bienvenido, {{ Auth::user()->name }}</h1>
@stop

@section('content')
    {{-- Mensajes de error o éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Accesos rápidos --}}
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Mis Pedidos</h3>
                    <p>Consulta tus pedidos realizados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('pedidos.index') }}" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Mi Perfil</h3>
                    <p>Actualiza tu información personal</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{ route('perfil.index') }}" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Soporte</h3>
                    <p>Contáctanos para resolver tus dudas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-headset"></i>
                </div>
                <a href="{{ route('soporte.index') }}" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Estilos personalizados --}}
    <style>
        .small-box {
            border-radius: 10px;
        }
    </style>
@stop

@section('js')
    <script> console.log("Vista de inicio del usuario cargada correctamente."); </script>
@stop
