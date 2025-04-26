@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="container">
    <h1 class="mb-4">Catálogo de Productos</h1>
    <div class="row">
        @forelse ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Mostrar la imagen del producto con tamaño ajustado -->
                    <img src="{{ asset($producto->imagen ?? 'imagenes/garrafon.png') }}" class="card-img-top" alt="{{ $producto->nombre }}" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        <p class="card-text"><strong>Cantidad Disponible:</strong> {{ $producto->cantidad }}</p>
                        <a href="{{ route('productos.pedido', $producto->id) }}" class="btn btn-primary">Hacer Pedido</a>
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
