@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')
<div class="container contenido-ajustado">
    <h1 class="mb-4">Mis Pedidos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($pedidos->isEmpty())
        <p class="text-center">No has realizado ningún pedido aún.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="thead-light">
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
        </div>
    @endif
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
        .table-responsive {
            margin-bottom: 1rem;
        }
    }
</style>
@stop
