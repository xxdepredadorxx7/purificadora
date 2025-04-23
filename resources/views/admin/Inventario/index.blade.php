<!-- filepath: c:\laragon\www\purificadora\resources\views\admin\inventario\index.blade.php -->
@extends('layouts.app')

@section('title', 'Inventario')

@section('content')
<div class="container">
    <h1>Inventario</h1>
    <a href="{{ route('admin.inventario.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id }}</td>
                    <td>{{ $inventario->producto }}</td>
                    <td>{{ $inventario->cantidad }}</td>
                    <td>
                        <a href="{{ route('admin.inventario.edit', $inventario) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.inventario.destroy', $inventario) }}" method="POST" style="display:inline;">
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
