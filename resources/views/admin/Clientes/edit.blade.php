@extends('layouts.app')

@section('content')
<div class="container contenido-ajustado">
    <h1 class="mb-4 text-center text-md-left">Editar Cliente</h1>
    <form action="{{ route('admin.clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Campo Nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cliente->name) }}" required>
        </div>

        {{-- Campo Correo Electrónico --}}
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
        </div>

        {{-- Campo Contraseña (Opcional) --}}
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (Opcional)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        {{-- Campo Confirmar Contraseña --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        {{-- Botones --}}
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary mb-2 mb-md-0 me-md-2 w-100 w-md-auto">Guardar Cambios</button>
            <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary w-100 w-md-auto">Cancelar</a>
        </div>
    </form>
</div>
@endsection

@section('css')
<style>
    @media (max-width: 576px) {
        .contenido-ajustado {
            padding-top: 70px !important;
        }
        .form-label {
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
@endsection
