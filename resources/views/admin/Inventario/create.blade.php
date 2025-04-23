@extends('layouts.app')

@section('title', 'Agregar al Inventario')

@section('content')
<div class="container">
    <h1>Agregar al Inventario</h1>
    <form action="{{ route('admin.inventario.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" name="producto" id="producto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('admin.inventario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
