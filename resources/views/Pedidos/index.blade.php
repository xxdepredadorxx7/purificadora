@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')
<div class="container">
    <h1 class="mb-4">Mis Pedidos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($pedidos->isEmpty())
        <p class="text-center">No has realizado ningún pedido aún.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->producto->nombre }}</td>
                        <td>{{ $pedido->cantidad }}</td>
                        <td>${{ $pedido->total }}</td>
                        <td>{{ ucfirst($pedido->estado) }}</td>
                        <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@stop
