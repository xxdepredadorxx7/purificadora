@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1>Agregar Producto</h1>
    <form action="{{ route('admin.productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad de productos</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="0">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop
