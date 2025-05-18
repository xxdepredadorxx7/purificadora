@extends('layouts.app')

@section('title', 'Hacer Pedido')

@section('content')
<div class="container contenido-ajustado">
    <h1 class="mb-4 text-center text-md-left">Hacer Pedido</h1>
    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="producto">Producto</label>
            <input type="text" class="form-control" id="producto" value="{{ $producto->nombre }}" disabled>
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
        </div>
        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" max="{{ $producto->cantidad }}" required>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success mb-2 mb-md-0 me-md-2 w-100 w-md-auto">Realizar Pedido</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary w-100 w-md-auto">Cancelar</a>
        </div>
    </form>
</div>
@stop

@section('css')
<style>
    @media (max-width: 576px) {
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .form-group label {
            font-size: 1rem;
        }
        .form-control {
            font-size: 1rem;
        }
        .btn {
            font-size: 1.1rem;
        }
        .d-grid {
            gap: 0.5rem;
        }
    }
</style>
@stop
