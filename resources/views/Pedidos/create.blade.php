@extends('layouts.app')

@section('title', 'Hacer Pedido')

@section('content')
<div class="container">
    <h1 class="mb-4">Hacer Pedido</h1>
    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" class="form-control" id="producto" value="{{ $producto->nombre }}" disabled>
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" max="{{ $producto->cantidad }}" required>
        </div>
        <button type="submit" class="btn btn-success">Realizar Pedido</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
