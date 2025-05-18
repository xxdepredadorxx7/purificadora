@extends('layouts.app')

@section('title', 'Productos')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container contenido-ajustado">
    <h1 class="mb-3">Productos</h1>
    <a href="{{ route('admin.productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-warning btn-sm mb-1 mb-md-0">Editar</a>
                            <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" style="display:inline;">
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
