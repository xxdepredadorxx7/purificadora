<!-- filepath: c:\laragon\www\purificadora\resources\views\admin\Inventario\create.blade.php -->
@extends('layouts.app')

@section('title', 'Agregar Producto al Inventario')

@section('content')
<div class="container">
    <h1>Agregar Producto al Inventario</h1>
    <form action="{{ route('admin.inventario.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="producto">Nombre del Producto</label>
            <input type="text" name="producto" id="producto" class="form-control" placeholder="Ejemplo: Garrafón 20L" value="{{ old('producto') }}" required>
            @error('producto')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ejemplo: 50" value="{{ old('cantidad') }}" required>
            @error('cantidad')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('admin.inventario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
