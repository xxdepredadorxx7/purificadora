@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
<div class="container contenido-ajustado">
    <h1>Pedidos</h1>
    <a href="{{ route('admin.pedidos.create') }}" class="btn btn-primary mb-3">Agregar Pedido</a>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead class="thead-light">
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
                            <a href="{{ route('admin.pedidos.edit', $pedido) }}" class="btn btn-warning btn-sm mb-1 mb-md-0">Editar</a>
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
</div>
@stop

@section('css')
<style>
    @media (max-width: 576px) {
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .table {
            font-size: 0.95rem;
        }
        .table th, .table td {
            padding: 0.5rem;
        }
        .btn {
            font-size: 1rem;
        }
        .table-responsive {
            margin-bottom: 1rem;
        }
    }
</style>
@stop
