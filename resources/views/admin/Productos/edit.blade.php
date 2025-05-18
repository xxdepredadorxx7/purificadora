@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container contenido-ajustado">
    <h1 class="mb-4 text-center text-md-left">Editar Producto</h1>
    <form action="{{ route('admin.productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="2">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $producto->cantidad }}" required>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary mb-2 mb-md-0 me-md-2 w-100 w-md-auto">Actualizar</button>
            <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary w-100 w-md-auto">Cancelar</a>
        </div>
    </form>
</div>
@stop

@section('css')
<style>
    @media (max-width: 576px) {
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .form-group label {
            font-size: 1rem;
        }
        .form-control {
            font-size: 1rem;
        }
        .btn {
            font-size: 1.1rem;
        }
        .d-grid {
            gap: 0.5rem;
        }
    }
</style>
@stop
