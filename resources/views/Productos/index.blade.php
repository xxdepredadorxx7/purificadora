@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="container contenido-ajustado">
    <h1 class="mb-4 text-center text-md-left">Catálogo de Productos</h1>
    <div class="row">
        @forelse ($productos as $producto)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Imagen del producto -->
                    <img src="{{ asset($producto->imagen ?? 'imagenes/garrafon.png') }}"
                         class="card-img-top img-fluid"
                         alt="{{ $producto->nombre }}"
                         style="height: 150px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        <p class="card-text"><strong>Cantidad Disponible:</strong> {{ $producto->cantidad }}</p>
                        <a href="{{ route('productos.pedido', $producto->id) }}" class="btn btn-primary mt-auto btn-block">
                            Hacer Pedido
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No hay productos disponibles en este momento.</p>
            </div>
        @endforelse
    </div>
</div>
@stop

@section('css')
<style>
    @media (max-width: 576px) {
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .card-title {
            font-size: 1.1rem;
        }
        .card-text {
            font-size: 1rem;
        }
        .btn {
            font-size: 1.05rem;
        }
        .card-img-top {
            height: 120px !important;
        }
    }
</style>
@stop
