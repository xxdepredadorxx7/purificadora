@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
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
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
