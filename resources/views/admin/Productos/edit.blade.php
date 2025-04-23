@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('admin.productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}" required>
        </div>
        <div class="form-group">
            <label for="inventario_id">Inventario</label>
            <select name="inventario_id" id="inventario_id" class="form-control">
                <option value="">Sin inventario</option>
                @foreach ($inventarios as $inventario)
                    <option value="{{ $inventario->id }}" {{ $producto->inventario_id == $inventario->id ? 'selected' : '' }}>
                        {{ $inventario->producto }} (Cantidad: {{ $inventario->cantidad }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
