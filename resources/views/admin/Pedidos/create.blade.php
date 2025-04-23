@extends('layouts.app')

@section('title', 'Agregar Pedido')

@section('content')
<div class="container">
    <h1>Agregar Pedido</h1>
    <form action="{{ route('admin.pedidos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Cliente</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
