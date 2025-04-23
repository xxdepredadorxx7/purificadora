<!-- filepath: c:\laragon\www\purificadora\resources\views\admin\Inventario\edit.blade.php -->
@extends('layouts.app')

@section('title', 'Editar Producto del Inventario')

@section('content')
<div class="container">
    <h1>Editar Producto del Inventario</h1>
    <form action="{{ route('admin.inventario.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="producto">Nombre del Producto</label>
            <input type="text" name="producto" id="producto" class="form-control" value="{{ old('producto', $inventario->producto) }}" required>
            @error('producto')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad', $inventario->cantidad) }}" required>
            @error('cantidad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.inventario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
