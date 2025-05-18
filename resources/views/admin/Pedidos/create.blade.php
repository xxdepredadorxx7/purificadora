@extends('layouts.app')

@section('title', 'Agregar Pedido')

@section('content')
<div class="container contenido-ajustado">
    <h1 class="mb-4 text-center text-md-left">Agregar Pedido</h1>
    <form action="{{ route('admin.pedidos.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="user_id">Cliente</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
        </div>
        <div class="form-group mb-3">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="completado">Completado</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success mb-2 mb-md-0 me-md-2 w-100 w-md-auto">Guardar</button>
            <a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary w-100 w-md-auto">Cancelar</a>
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
