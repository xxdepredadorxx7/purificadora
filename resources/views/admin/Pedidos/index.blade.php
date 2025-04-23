@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
<div class="container">
    <h1>Pedidos</h1>
    <a href="{{ route('admin.pedidos.create') }}" class="btn btn-primary mb-3">Agregar Pedido</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->user->name }}</td>
                    <td>{{ $pedido->producto->nombre }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>${{ $pedido->total }}</td>
                    <td>{{ ucfirst($pedido->estado) }}</td>
                    <td>
                        <a href="{{ route('admin.pedidos.edit', $pedido) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.pedidos.destroy', $pedido) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
